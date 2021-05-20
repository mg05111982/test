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

        // добавляем роль "seller"
        $seller = $auth->createRole('seller');
        $auth->add($seller);

        // добавляем роль "buyer"
        $buyer = $auth->createRole('buyer');
        $auth->add($buyer);

        // добавляем роль "admin"
        $admin = $auth->createRole('admin');

        $auth->add($admin);
    }

}