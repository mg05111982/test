<?php


namespace app\models;


use Yii;

class Notifications
{
    const NOTICE = 'notice';

    public function notification()
    {
        $mailer = Yii::$app->mailer;
        $recipient = User::find()
            ->select('email')
            ->where(['active' => 1])
            ->asArray()
            ->column();

        $mailer->compose()
            ->setTo($recipient)
            ->setFrom('admin@example.com')
            ->setSubject('Добавлена новая новость')
            ->setTextBody('Вновь добавленную новость вы можете прочитать уже сейчас')
            ->send();
    }
}