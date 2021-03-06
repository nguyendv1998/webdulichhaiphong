<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sliders".
 *
 * @property int $id
 * @property string|null $File
 * @property int|null $isActive
 * @property string|null $Title
 * @property string|null $Alt
 */
class Sliders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $anhslider;
    public static function tableName()
    {
        return 'sliders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['isActive'], 'integer'],
            [['File'], 'string', 'max' => 100],
            [['Title', 'Alt'], 'string', 'max' => 200],
            [['anhslider'],'required','message'=>'Ảnh slider không được để trống'],
            [['Title'],'required','message'=>'Tiêu đề của ảnh không được để trống'],
            [['Alt'],'required','message'=>'Alt của ảnh không được để trống'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'File' => 'File',
            'isActive' => 'Hoạt động',
            'Title' => 'Tiêu đề của ảnh',
            'Alt' => 'Alt của ảnh',
            'anhslider' => 'Ảnh silder',
        ];
    }
    public function beforeDelete()
    {
        $path = dirname(dirname(__DIR__)) . '/images/sliders/'.$this->File;
        if(is_file($path)) unlink($path);
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }
}
