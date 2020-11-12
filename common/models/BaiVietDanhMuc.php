<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "baivietdanhmuc".
 *
 * @property int $id
 * @property int $DanhMuc_id
 * @property int $BaiViet_id
 *
 * @property BaiViet $baiViet
 * @property DanhMuc $danhMuc
 */
class BaiVietDanhMuc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'baivietdanhmuc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DanhMuc_id', 'BaiViet_id'], 'required'],
            [['DanhMuc_id', 'BaiViet_id'], 'integer'],
            [['BaiViet_id'], 'exist', 'skipOnError' => true, 'targetClass' => BaiViet::className(), 'targetAttribute' => ['BaiViet_id' => 'id']],
            [['DanhMuc_id'], 'exist', 'skipOnError' => true, 'targetClass' => DanhMuc::className(), 'targetAttribute' => ['DanhMuc_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'DanhMuc_id' => 'Danh Muc ID',
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
     * Gets query for [[DanhMuc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDanhMuc()
    {
        return $this->hasOne(DanhMuc::className(), ['id' => 'DanhMuc_id']);
    }
}
