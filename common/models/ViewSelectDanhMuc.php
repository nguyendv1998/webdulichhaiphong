<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "viewselectdanhmuc".
 *
 * @property int $id
 * @property string|null $TenDanhMuc
 * @property string|null $Code
 * @property int|null $DanhMucCha_id
 */
class ViewSelectDanhMuc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'viewselectdanhmuc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'DanhMucCha_id'], 'integer'],
            [['TenDanhMuc', 'Code'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'TenDanhMuc' => 'Ten Danh Muc',
            'Code' => 'Code',
            'DanhMucCha_id' => 'Danh Muc Cha ID',
        ];
    }
}
