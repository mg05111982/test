<?php


namespace app\models;


use Yii;
use yii\data\ActiveDataProvider;

class PostsSearch extends \yii\db\ActiveRecord
{
    public static function search() {
        $query = Posts::find();

        if (Yii::$app->user->can('user')) {
            $query->where(['moderate' => 1]);
        }

        $provider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'updated_at' => SORT_DESC,
                ],
            ]
        ]);

        return $provider;
    }
}