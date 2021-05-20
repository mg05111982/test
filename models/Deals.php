<?php


namespace app\models;


class Deals extends \yii\db\ActiveRecord
{
    public function rules()
    {
        return [
            [['seller', 'buyer'], 'integer'],
            [['confirm'], 'integer'],
        ];
    }

    public static function deal($seller, $buyer, $confirm)
    {
        $deal = new DealCompletion();
        if (!$completion = $deal->existsDial($seller, $buyer)) {
            $completion = $deal->newDeal($seller, $buyer, $confirm);
        }

        return $completion;
    }
}