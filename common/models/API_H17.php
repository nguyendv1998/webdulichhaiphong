<?php


namespace common\models;


class API_H17
{
    public static function createCode($str)
    {
        if(!$str) return false;
        $str=explode(" ",$str);
        foreach ($str as $key => $item)
        {
            if($item=='') unset($str[$key]);
        }
        $str=implode("-",$str);

        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
        $str = preg_replace("/(đ)/", "d", $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
        $str = preg_replace("/(Đ)/", "D", $str);
        $str = strtolower($str);
        $str = preg_replace('/[^A-Za-z0-9\-]/', '', $str);
        $str = str_replace(" ", "-", str_replace("&*#39;","",$str));
        while (strpos($str,'--'))
        {
            $str=str_replace('--','-',$str);
        }
        while (strpos($str,':'))
        {
            $str=str_replace(':','',$str);
        }
        $str = preg_replace("'/'",'-',$str);
        return $str;
    }
    public static function strpos($str,$char)
    {
        for($i = strlen($str)-1;$i>=0;$i--)
        {
            if($str[$i]===$char) return substr($str,$i+1);
        }
        return $str;
    }
    public static function GetImageType($imagetype)
    {
        for($i=strlen($imagetype)-1;$i>=0;$i--)
        {
            if($imagetype[$i]=='/') return ".".substr($imagetype,$i-strlen($imagetype)+1);
        }
    }
    public static function isAccess($vaitro)
    {
        if(\yii::$app->user->isGuest) return false;
        else
        {
            /** @var $user_logged_in User*/
            $user_logged_in=\yii::$app->user->identity;
            if($user_logged_in->LoaiTaiKhoan=='admin') return true;
            return in_array($user_logged_in->LoaiTaiKhoan,$vaitro);
        }
    }
    public static function isAdmin()
    {
        if(\yii::$app->user->isGuest) return false;
        else
        {
            /** @var $user_logged_in User*/
            $user_logged_in=\yii::$app->user->identity;
            return $user_logged_in->LoaiTaiKhoan=='admin';
        }
    }
    public static function isReporter()
    {
        if(\yii::$app->user->isGuest) return false;
        else
        {
            /** @var $user_logged_in User*/
            $user_logged_in=\yii::$app->user->identity;
            return ($user_logged_in->LoaiTaiKhoan=='bientapvien' || $user_logged_in->LoaiTaiKhoan=='admin');
        }
    }
    public static function cropImageJPG($imgSrc,$w,$h)
    {
        //getting the image dimensions
        list($width, $height) = getimagesize($imgSrc);

        //saving the image into memory (for manipulation with GD Library)
        $myImage = imagecreatefromjpeg($imgSrc);

        // calculating the part of the image to use for thumbnail
        if ($width > $height) {
            $y = 0;
            $x = ($width - $height) / 2;
            $smallestSide = $height;
        } else {
            $x = 0;
            $y = ($height - $width) / 2;
            $smallestSide = $width;
        }

        // copying the part into thumbnail
        $thumbSize = $w;
        $thumbSize1 =$h;
        ini_set('memory_limit', '-1');
        $thumb = imagecreatetruecolor($thumbSize, $thumbSize1);
        imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $thumbSize, $thumbSize1, $smallestSide, $smallestSide);

        //final output
        return($thumb);
    }
    public static function cropImagePNG($imgSrc,$w,$h)
    {
        //getting the image dimensions
        list($width, $height) = getimagesize($imgSrc);

        //saving the image into memory (for manipulation with GD Library)
        $myImage = imagecreatefrompng($imgSrc);

        // calculating the part of the image to use for thumbnail
        if ($width > $height) {
            $y = 0;
            $x = ($width - $height) / 2;
            $smallestSide = $height;
        } else {
            $x = 0;
            $y = ($height - $width) / 2;
            $smallestSide = $width;
        }

        // copying the part into thumbnail
        $thumbSize = $w;
        $thumbSize1 =$h;
        ini_set('memory_limit', '-1');
        $thumb = imagecreatetruecolor($thumbSize, $thumbSize1);
        imagealphablending($thumb, false);
        $color = imagecolortransparent($thumb, imagecolorallocatealpha($thumb, 0, 0, 0, 127));
        ini_set('memory_limit', '-1');
        imagefill($thumb, 0, 0, $color);
        imagesavealpha($thumb, true);
        imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $thumbSize, $thumbSize1, $smallestSide, $smallestSide);

        //final output
        return($thumb);
    }
    public static function Alert($message)
    {
        echo '<script language="javascript">';
        echo "alert('{$message}')";
        echo '</script>';
    }
    public static function reduceImgIpg($imgSrc){
        list($width, $height) = getimagesize($imgSrc);

        //saving the image into memory (for manipulation with GD Library)
        $myImage = imagecreatefromjpeg($imgSrc);

        // calculating the part of the image to use for thumbnail
        if ($width > $height) {
            $y = 0;
            $x = ($width - $height) / 2;
            $smallestSide = $height;
        } else {
            $x = 0;
            $y = ($height - $width) / 2;
            $smallestSide = $width;
        }
        ini_set('memory_limit', '-1');
        // copying the part into thumbnail
        $thumb = imagecreatetruecolor($width, $height);
        imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $width, $height, $smallestSide, $smallestSide);

        //final output
        return($thumb);
    }
    public static function reduceImgPNG($imgSrc)
    {
        //getting the image dimensions
        list($width, $height) = getimagesize($imgSrc);

        //saving the image into memory (for manipulation with GD Library)
        $myImage = imagecreatefrompng($imgSrc);

        // calculating the part of the image to use for thumbnail
        if ($width > $height) {
            $y = 0;
            $x = ($width - $height) / 2;
            $smallestSide = $height;
        } else {
            $x = 0;
            $y = ($height - $width) / 2;
            $smallestSide = $width;
        }

        // copying the part into thumbnail
        $thumbSize = $width;
        $thumbSize1 =$height;
        ini_set('memory_limit', '-1');
        $thumb = imagecreatetruecolor($thumbSize, $thumbSize1);
        imagealphablending($thumb, false);
        $color = imagecolortransparent($thumb, imagecolorallocatealpha($thumb, 0, 0, 0, 127));
        imagefill($thumb, 0, 0, $color);
        imagesavealpha($thumb, true);
        imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $thumbSize, $thumbSize1, $smallestSide, $smallestSide);

        //final output
        return($thumb);
    }
}