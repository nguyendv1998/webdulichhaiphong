<?php

namespace common\models;

use Yii;
use yii\db\Exception;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "baiviet".
 *
 * @property int $id
 * @property string|null $TenBaiViet
 * @property string|null $TomTat
 * @property string|null $NoiDung
 * @property string|null $Code
 * @property string|null $AnhDaiDien
 * @property string|null $ThoiGianDang
 * @property string|null $ThoiGianChinhSua
 * @property int $NguoiDang_id
 * @property int|null $NguoiSua_id
 * @property int|null $XuatBan
 * @property int|null $NoiBat
 * @property int|null $NhanVatLichSu_id
 * @property int|null $LangNghe_id
 * @property int|null $LeHoi_id
 * @property int|null $DiaDanh_id
 * @property string|null $Title
 * @property string|null $Alt
 * @property int|null $Like
 *
 * @property AnhLienQuan[] $anhlienquans
 * @property User $nguoiDang
 * @property User $nguoiSua
 * @property DiaDanh $diaDanh
 * @property Langnghe $langNghe
 * @property Lehoi $leHoi
 * @property NhanVatLichSu $nhanVatLichSu
 * @property BaiVietDanhMuc[] $baivietdanhmucs
 * @property TuKhoaChiTiet[] $tukhoachitiets
 */
class BaiViet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $anh_dai_dien;
    public $bai_viet_danh_mucs;
    public $bai_viet_tu_khoas;
    public $anh_lien_quans;
    public $luot_like_tu;
    public static function tableName()
    {
        return 'baiviet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TomTat', 'NoiDung'], 'string'],
            [['ThoiGianDang', 'ThoiGianChinhSua','anh_dai_dien','bai_viet_danh_mucs','bai_viet_tu_khoas','anh_lien_quans','luot_like_tu'], 'safe'],
            [['TenBaiViet','TomTat',], 'required','message'=>'{attribute} không được để trống'],
            [['NguoiDang_id', 'NguoiSua_id', 'XuatBan', 'NoiBat', 'NhanVatLichSu_id', 'LangNghe_id', 'LeHoi_id', 'DiaDanh_id', 'Like'], 'integer'],
            [['TenBaiViet', 'Code', 'Title', 'Alt'], 'string', 'max' => 200],
            [['AnhDaiDien'], 'string', 'max' => 255],
            [['NguoiDang_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['NguoiDang_id' => 'id']],
            [['NguoiSua_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['NguoiSua_id' => 'id']],
            [['DiaDanh_id'], 'exist', 'skipOnError' => true, 'targetClass' => DiaDanh::className(), 'targetAttribute' => ['DiaDanh_id' => 'id']],
            [['LangNghe_id'], 'exist', 'skipOnError' => true, 'targetClass' => LangNghe::className(), 'targetAttribute' => ['LangNghe_id' => 'id']],
            [['LeHoi_id'], 'exist', 'skipOnError' => true, 'targetClass' => LeHoi::className(), 'targetAttribute' => ['LeHoi_id' => 'id']],
            [['NhanVatLichSu_id'], 'exist', 'skipOnError' => true, 'targetClass' => NhanVatLichSu::className(), 'targetAttribute' => ['NhanVatLichSu_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'TenBaiViet' => 'Tiêu đề bài viết',
            'TomTat' => 'Tóm tắt',
            'NoiDung' => 'Nội dung chi tiét',
            'Code' => 'Code',
            'AnhDaiDien' => 'Ảnh đại diện',
            'anh_dai_dien' => 'Ảnh đại diện',
            'ThoiGianDang' => 'Thời gian đăng',
            'ThoiGianChinhSua' => 'Thời gian chỉnh sửa',
            'NguoiDang_id' => 'Người đăng',
            'NguoiSua_id' => 'Người sửa',
            'XuatBan' => 'Xuất bản',
            'NoiBat' => 'Nổi bật',
            'NhanVatLichSu_id' => 'Nhân vật lịch sử',
            'LangNghe_id' => 'Làng nghề',
            'LeHoi_id' => 'Lễ hội',
            'DiaDanh_id' => 'Địa danh',
            'Title' => 'Title của ảnh đại diện',
            'Alt' => 'Alt của ảnh đại diện',
            'Like' => 'Số lượt thích',
            'bai_viet_tu_khoas' => 'Từ khóa',
            'bai_viet_danh_mucs' => 'Danh mục',
            'anh_lien_quans' => 'Ảnh liên quan',
            'luot_like_tu' => 'Lượt like từ ',
        ];
    }

    /**
     * Gets query for [[Anhlienquans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnhlienquans()
    {
        return $this->hasMany(AnhLienQuan::className(), ['BaiViet_id' => 'id']);
    }

    /**
     * Gets query for [[NguoiDang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNguoiDang()
    {
        return $this->hasOne(User::className(), ['id' => 'NguoiDang_id']);
    }

    /**
     * Gets query for [[NguoiSua]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNguoiSua()
    {
        return $this->hasOne(User::className(), ['id' => 'NguoiSua_id']);
    }

    /**
     * Gets query for [[DiaDanh]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiaDanh()
    {
        return $this->hasOne(DiaDanh::className(), ['id' => 'DiaDanh_id']);
    }

    /**
     * Gets query for [[LangNghe]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLangNghe()
    {
        return $this->hasOne(LangNghe::className(), ['id' => 'LangNghe_id']);
    }

    /**
     * Gets query for [[LeHoi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeHoi()
    {
        return $this->hasOne(LeHoi::className(), ['id' => 'LeHoi_id']);
    }

    /**
     * Gets query for [[NhanVatLichSu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNhanVatLichSu()
    {
        return $this->hasOne(NhanVatLichSu::className(), ['id' => 'NhanVatLichSu_id']);
    }

    /**
     * Gets query for [[Baivietdanhmucs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaivietdanhmucs()
    {
        return $this->hasMany(BaiVietDanhMuc::className(), ['BaiViet_id' => 'id']);
    }

    /**
     * Gets query for [[Tukhoachitiets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTukhoachitiets()
    {
        return $this->hasMany(TuKhoaChiTiet::className(), ['BaiViet_id' => 'id']);
    }
    public function beforeSave($insert)
    {
        $this->TenBaiViet=trim($this->TenBaiViet);
        $this->Code=API_H17::createCode($this->TenBaiViet);
        echo $this->Code;
        if($insert){
            $this->NguoiDang_id=yii::$app->user->identity->getId();
            $this->ThoiGianDang=date("Y-m-d H:i:s");
            $this->Like=0;
        }
        $this->ThoiGianChinhSua=date("Y-m-d H:i:s");
        $this->NguoiSua_id=yii::$app->user->identity->getId();
        $anhdaidien=UploadedFile::getInstance($this,'anh_dai_dien');
        if($anhdaidien!=null){
            if(!$insert){
                $baiviet_old=BaiViet::findOne($this->id);
                try {
                    $path=dirname(dirname(__DIR__)) . '/images/anhdaidien/' . $baiviet_old->AnhDaiDien;
                    if(is_file($path)) unlink($path);
                }
                catch (Exception $ex){}
            }
            $file_type=API_H17::GetImageType($anhdaidien->type);
            $filename=$this->Code.time().$file_type;
            if(strlen($filename)>200) $filename = substr($filename,strlen($filename) - 200);
            $path=dirname(dirname(__DIR__)) . '/images/anhdaidien/' . $filename;
            $anhdaidien->saveAs($path);
            if(strpos(strtolower($file_type),'jpg')||strpos(strtolower($file_type),'jpeg')){
                $image=API_H17::cropImageJPG($path,1080,800);
                imagejpeg($image, $path);
            }
            elseif (strpos(strtolower($file_type),'png')){
                $image=API_H17::cropImagePNG($path,1080,800);
                imagepng($image,$path);
            }
            $this->AnhDaiDien=$filename;
            if(trim($this->Title)=='')  $this->Title=$this->TenBaiViet;
            if(trim($this->Alt)=='')  $this->Alt=$this->TenBaiViet;
        }
//        VarDumper::dump($this->attributes,10,true);
//        exit;
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
    public function afterSave($insert, $changedAttributes)
    {
        if(!$insert){
            if(!$insert){
                TuKhoaChiTiet::deleteAll(['BaiViet_id'=>$this->id]);
                BaiVietDanhMuc::deleteAll(['BaiViet_id'=>$this->id]);
            }
        }
        if($this->bai_viet_tu_khoas!=null && $this->bai_viet_tu_khoas!=''){
            $baiviettukhoamois=explode(',',$this->bai_viet_tu_khoas);
            foreach ($baiviettukhoamois as $item){
                $old_tag=TuKhoa::findOne(['TenTuKhoa'=>trim($item)]);
                if(is_null($old_tag)){
                    $new_tag= new TuKhoa();
                    $new_tag->TenTuKhoa=trim($item);
                    $new_tag->Code=API_H17::createCode(trim($item));
                    $new_tag->save();
                    $id_tukhoa=$new_tag->id;
                }
                else $id_tukhoa=$old_tag->id;
                $Baiviettukhoa=new TuKhoaChiTiet();
                $Baiviettukhoa->BaiViet_id=$this->id;
                $Baiviettukhoa->TuKhoa_id=$id_tukhoa;
                $Baiviettukhoa->save();
            }
        }
        if($this->bai_viet_danh_mucs!=null){
            foreach ($this->bai_viet_danh_mucs as $item)
            {
                $danhmucbaiviets= new BaiVietDanhMuc();
                $danhmucbaiviets->BaiViet_id=$this->id;
                $danhmucbaiviets->DanhMuc_id=$item;
                $danhmucbaiviets->save();
            }
        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }
    public function beforeDelete()
    {
        yii::$app->session->setFlash('baiviet_delete_anhdaidien',$this->AnhDaiDien);
        TuKhoaChiTiet::deleteAll(['BaiViet_id'=>$this->id]);
        BaiVietDanhMuc::deleteAll(['BaiViet_id'=>$this->id]);
        $anhlienquan=AnhLienQuan::findAll(['BaiViet_id'=>$this->id]);
        foreach ($anhlienquan as $item){
            $path = dirname(dirname(__DIR__)) . '/images/anhlienquan/'.$item->File;
            if(is_file($path)) unlink($path);
            $item->delete();
        }
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }
    public function afterDelete()
    {
        $filename=yii::$app->session->getFlash('baiviet_delete_anhdaidien');
        yii::$app->session->removeFlash('baiviet_delete_anhdaidien');
        $path=dirname(dirname(__DIR__)) . '/images/anhdaidien/' . $filename;
        if(is_file($path)) unlink($path);
        parent::afterDelete(); // TODO: Change the autogenerated stub
    }
}
