<?php


namespace app\models;


use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Posts extends ActiveRecord
{
    public function behaviors()
    {
        return [
            'class' => TimestampBehavior::className(),
        ];
    }

    public function init()
    {
        Yii::$app->on(Notifications::NOTICE, [Notifications::class, 'notification']);
    }

}