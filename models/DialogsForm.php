<?php


namespace app\models;


class DialogsForm extends \yii\base\Model
{
    public $seller_id;
    public $buyer_id;
    public $direction;
    public $message;

    public function rules()
    {
        return [
            [['message'], 'string'],
            [['seller_id', 'buyer_id'], 'integer'],
            [['direction'], 'integer'],
        ];
    }

    public function save()
    {
        $dialogs = new Dialogs();
        $dialogs->attributes = $this->attributes;
        return $dialogs->save();
    }
}