<?php


namespace app\models;


class DealCompletion
{
    public function existsDial($seller, $buyer)
    {
        return Deals::find()->where([
                'seller' => $seller,
                'buyer' => $buyer,
            ])
            ->exists();
    }

    public function newDeal($seller, $buyer, $confirm)
    {
        return (new Deals([
                'seller' => $seller,
                'buyer' => $buyer,
                'confirm' => $confirm,
            ]))
            ->save();
    }
}