<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class InitAddonsController extends Controller
{
    public function actionIndex()
    {
        $auth = Yii::$app->authManager;

        // добавляем роль "seller"
        $seller = $auth->createRole('seller');
        $auth->add($seller);

        // добавляем роль "buyer"
        $buyer = $auth->createRole('buyer');
        $auth->add($buyer);
    }

}