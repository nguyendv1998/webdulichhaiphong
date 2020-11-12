<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tukhoachitiet".
 *
 * @property int $id
 * @property int $TuKhoa_id
 * @property int $BaiViet_id
 *
 * @property BaiViet $baiViet
 * @property TuKhoa $tuKhoa
 */
class TuKhoaChiTiet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tukhoachitiet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TuKhoa_id', 'BaiViet_id'], 'required'],
            [['TuKhoa_id', 'BaiViet_id'], 'integer'],
            [['BaiViet_id'], 'exist', 'skipOnError' => true, 'targetClass' => BaiViet::className(), 'targetAttribute' => ['BaiViet_id' => 'id']],
            [['TuKhoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => TuKhoa::className(), 'targetAttribute' => ['TuKhoa_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'TuKhoa_id' => 'Tu Khoa ID',
            'BaiViet_id' => 'Bai Viet ID',
        ];
    }

    /**
     * Gets query for [[BaiViet]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaiViet()
    {
        return $this->hasOne(BaiViet::className(), ['id' => 'BaiViet_id']);
    }

    /**
     * Gets query for [[TuKhoa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTuKhoa()
    {
        return $this->hasOne(TuKhoa::className(), ['id' => 'TuKhoa_id']);
    }
}
