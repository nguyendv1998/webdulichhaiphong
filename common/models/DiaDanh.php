<?php

namespace common\models;

use Codeception\Lib\Di;
use Yii;
use yii\db\Exception;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "diadanh".
 *
 * @property int $id
 * @property string|null $TenDiaDanh
 * @property string|null $ToaDo
 * @property string|null $TomTat
 * @property string|null $MoTaChiTiet
 * @property string|null $AnhDaiDien
 * @property string|null $Code
 * @property int|null $CapCongNhan_id
 * @property int|null $QuanHuyen_id
 * @property int|null $DanhMuc_id
 * @property int|null $NhanVatLichSu_id
 * @property int|null $LoaiDiTich_id
 * @property string|null $Title
 * @property string|null $Alt
 *
 * @property Baiviet[] $baiviets
 * @property Loaiditich $loaiDiTich
 * @property Nhanvatlichsu $nhanVatLichSu
 * @property Capcongnhan $capCongNhan
 * @property Danhmuc $danhMuc
 * @property Quanhuyen $quanHuyen
 */
class DiaDanh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $anh_dai_dien;
    public static function tableName()
    {
        return 'diadanh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TomTat', 'MoTaChiTiet'], 'string'],
            [['CapCongNhan_id', 'QuanHuyen_id', 'DanhMuc_id', 'NhanVatLichSu_id', 'LoaiDiTich_id'], 'integer'],
            [['TenDiaDanh', 'Code', 'Title', 'Alt'], 'string', 'max' => 200],
            [['TenDiaDanh', 'TomTat', 'DanhMuc_id','ToaDo','QuanHuyen_id'], 'required', 'message' => "{attribute} không được để trống"],
            [['ToaDo'], 'string', 'max' => 100],
            [['AnhDaiDien'], 'string', 'max' => 250],
            [['anh_dai_dien'], 'safe'],
            [['LoaiDiTich_id'], 'exist', 'skipOnError' => true, 'targetClass' => LoaiDiTich::className(), 'targetAttribute' => ['LoaiDiTich_id' => 'id']],
            [['NhanVatLichSu_id'], 'exist', 'skipOnError' => true, 'targetClass' => NhanVatLichSu::className(), 'targetAttribute' => ['NhanVatLichSu_id' => 'id']],
            [['CapCongNhan_id'], 'exist', 'skipOnError' => true, 'targetClass' => CapCongNhan::className(), 'targetAttribute' => ['CapCongNhan_id' => 'id']],
            [['DanhMuc_id'], 'exist', 'skipOnError' => true, 'targetClass' => DanhMuc::className(), 'targetAttribute' => ['DanhMuc_id' => 'id']],
            [['QuanHuyen_id'], 'exist', 'skipOnError' => true, 'targetClass' => QuanHuyen::className(), 'targetAttribute' => ['QuanHuyen_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'TenDiaDanh' => 'Tên địa danh',
            'ToaDo' => 'Tọa độ',
            'TomTat' => 'Mô tả tóm tắt',
            'MoTaChiTiet' => 'Mô tả chi tiết',
            'AnhDaiDien' => 'Ảnh đại diện',
            'Code' => 'Code',
            'CapCongNhan_id' => 'Cấp công nhận',
            'QuanHuyen_id' => 'Quận huyện',
            'DanhMuc_id' => 'Danh mục',
            'NhanVatLichSu_id' => 'Nhân vật lịch sử',
            'LoaiDiTich_id' => 'Loại di tích',
            'Title' => 'Title của ảnh đại diện',
            'Alt' => 'Alt của ảnh đại diện',
            'anh_dai_dien' => 'Ảnh đại diện',
        ];
    }

    /**
     * Gets query for [[Baiviets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaiviets()
    {
        return $this->hasMany(BaiViet::className(), ['DiaDanh_id' => 'id']);
    }

    /**
     * Gets query for [[LoaiDiTich]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLoaiDiTich()
    {
        return $this->hasOne(LoaiDiTich::className(), ['id' => 'LoaiDiTich_id']);
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
     * Gets query for [[CapCongNhan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCapCongNhan()
    {
        return $this->hasOne(CapCongNhan::className(), ['id' => 'CapCongNhan_id']);
    }

    /**
     * Gets query for [[DanhMuc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDanhMuc()
    {
        return $this->hasOne(DanhMuc::className(), ['id' => 'DanhMuc_id']);
    }

    /**
     * Gets query for [[QuanHuyen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuanHuyen()
    {
        return $this->hasOne(QuanHuyen::className(), ['id' => 'QuanHuyen_id']);
    }
    public function beforeSave($insert)
    {
        $this->TenDiaDanh=trim($this->TenDiaDanh);
        $this->Code=API_H17::createCode($this->TenDiaDanh);
        $anhdaidien=UploadedFile::getInstance($this,'anh_dai_dien');
        if($anhdaidien!=null){
            if(!$insert){
                $DiaDanh_old=DiaDanh::findOne($this->id);
                try {
                    $path=dirname(dirname(__DIR__)) . '/images/anhdaidien/' . $DiaDanh_old->AnhDaiDien;
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
            if(trim($this->Title)=='')  $this->Title=$this->TenDiaDanh;
            if(trim($this->Alt)=='')  $this->Alt=$this->TenDiaDanh;
        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
    public function beforeDelete()
    {
        yii::$app->session->setFlash('diadanh_delete_anhdaidien',$this->AnhDaiDien);
        BaiViet::deleteAll(['DiaDanh_id'=>$this->id]);
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }
    public function afterDelete()
    {
        $filename=yii::$app->session->getFlash('diadanh_delete_anhdaidien');
        yii::$app->session->removeFlash('diadanh_delete_anhdaidien');
        $path=dirname(dirname(__DIR__)) . '/images/anhdaidien/' . $filename;
        if(is_file($path)) unlink($path);
        parent::afterDelete(); // TODO: Change the autogenerated stub
    }
}
