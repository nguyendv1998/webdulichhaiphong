<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "viewbaivietchitiet".
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
 * @property int|null $liked
 * @property int $BaiViet_id
 * @property int $Danhmuc_id
 * @property string|null $TenDanhMuc
 * @property string|null $TenDiaDanh
 * @property string|null $TenQuanHuyen
 * @property int|null $CapCongNhan_id
 * @property string|null $TenCapCongNhan
 * @property int|null $LoaiDiTich_id
 * @property string|null $TenLoaiDiTich
 */
class ViewBaiVietChiTiet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'viewbaivietchitiet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'NguoiDang_id', 'NguoiSua_id', 'XuatBan', 'NoiBat', 'NhanVatLichSu_id', 'LangNghe_id', 'LeHoi_id', 'DiaDanh_id', 'Like', 'liked', 'BaiViet_id', 'Danhmuc_id', 'CapCongNhan_id', 'LoaiDiTich_id'], 'integer'],
            [['TomTat', 'NoiDung'], 'string'],
            [['ThoiGianDang', 'ThoiGianChinhSua'], 'safe'],
            [['NguoiDang_id', 'BaiViet_id'], 'required'],
            [['TenBaiViet', 'Code', 'Title', 'Alt', 'TenDanhMuc', 'TenDiaDanh', 'TenCapCongNhan'], 'string', 'max' => 200],
            [['AnhDaiDien'], 'string', 'max' => 255],
            [['TenQuanHuyen'], 'string', 'max' => 50],
            [['TenLoaiDiTich'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'TenBaiViet' => 'Ten Bai Viet',
            'TomTat' => 'Tom Tat',
            'NoiDung' => 'Noi Dung',
            'Code' => 'Code',
            'AnhDaiDien' => 'Anh Dai Dien',
            'ThoiGianDang' => 'Thoi Gian Dang',
            'ThoiGianChinhSua' => 'Thoi Gian Chinh Sua',
            'NguoiDang_id' => 'Nguoi Dang ID',
            'NguoiSua_id' => 'Nguoi Sua ID',
            'XuatBan' => 'Xuat Ban',
            'NoiBat' => 'Noi Bat',
            'NhanVatLichSu_id' => 'Nhan Vat Lich Su ID',
            'LangNghe_id' => 'Lang Nghe ID',
            'LeHoi_id' => 'Le Hoi ID',
            'DiaDanh_id' => 'Dia Danh ID',
            'Title' => 'Title',
            'Alt' => 'Alt',
            'Like' => 'Like',
            'liked' => 'Liked',
            'BaiViet_id' => 'Bai Viet ID',
            'Danhmuc_id' => 'Danhmuc ID',
            'TenDanhMuc' => 'Ten Danh Muc',
            'TenDiaDanh' => 'Ten Dia Danh',
            'TenQuanHuyen' => 'Ten Quan Huyen',
            'CapCongNhan_id' => 'Cap Cong Nhan ID',
            'TenCapCongNhan' => 'Ten Cap Cong Nhan',
            'LoaiDiTich_id' => 'Loai Di Tich ID',
            'TenLoaiDiTich' => 'Ten Loai Di Tich',
        ];
    }
}
