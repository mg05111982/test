<?php


namespace app\models;


class Dialogs extends \yii\db\ActiveRecord
{
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['seller_id', 'buyer_id'], 'integer'],
            [['direction'], 'integer'],
        ];
    }
}