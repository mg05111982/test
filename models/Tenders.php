<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tenders".
 *
 * @property int $id
 * @property int|null $seller
 * @property string|null $documentation
 */
class Tenders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tenders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['buyer'], 'integer'],
            [['description'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'buyer' => 'Продавец',
            'description' => 'Описание',
        ];
    }
}
