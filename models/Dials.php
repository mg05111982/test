<?php


namespace app\models;


class Dials extends \yii\db\ActiveRecord
{
    public function rules()
    {
        return [
            [['seller', 'buyer'], 'integer'],
            [['confirm'], 'integer'],
        ];
    }

    public function dial($seller, $buyer, $confirm)
    {
        $dial = self::find()->where([
            'seller' => $seller,
            'buyer' => $buyer,
        ])->exists();

        if (!$dial) {
            $dial = (new static([
                'seller' => $seller,
                'buyer' => $buyer,
                'confirm' => $confirm,
            ]))->save();
        }

        return $dial;
    }
}