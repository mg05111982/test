<?php


namespace app\models;


use Yii;
use yii\data\ActiveDataProvider;

class UserSearch extends \yii\db\ActiveRecord
{
    public static function search() {
        $query = User::find();

        $provider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'username' => SORT_DESC,
                ],
            ]
        ]);

        return $provider;
    }
}