<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property int $id
 * @property string|null $TenCauHoi
 * @property string|null $NoiDungTraLoi
 * @property float|null $Uutien
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TenCauHoi', 'NoiDungTraLoi'], 'string'],
            [['Uutien'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'TenCauHoi' => 'Tên câu hỏi',
            'NoiDungTraLoi' => 'Nội dung trả lời',
            'Uutien' => 'Điểm ưu tiên',
        ];
    }
}
