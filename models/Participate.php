<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tenders_sellers".
 *
 * @property int $id
 * @property int|null $tender
 * @property int|null $seller
 * @property string|null $description
 */
class Participate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tenders_sellers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tender', 'seller'], 'integer'],
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
            'tender' => 'Тендер',
            'seller' => 'Продавец',
            'description' => 'Описание',
        ];
    }
}
