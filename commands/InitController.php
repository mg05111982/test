<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class InitController extends Controller
{
    public function actionIndex()
    {
        $auth = Yii::$app->authManager;

        // добавляем роль "user"
        $user = $auth->createRole('user');
        $auth->add($user);

        // добавляем роль "writer"
        $writer = $auth->createRole('writer');
        $auth->add($writer);

        // добавляем роль "moderator"
        $moderator = $auth->createRole('moderator');
        $auth->add($moderator);

        // добавляем роль "admin"
        $admin = $auth->createRole('admin');

        $auth->add($admin);

        $auth->addChild($admin, $user);
        $auth->addChild($admin, $writer);
        $auth->addChild($admin, $moderator);
    }

}