<?php

namespace app\controllers;

use app\models\Deals;
use yii\web\NotFoundHttpException;

class DealsController extends \yii\web\Controller
{
    public function actionIndex($seller, $buyer)
    {
        if (!isset($seller, $buyer)) {
            throw new NotFoundHttpException('Неверные параметры договора');
        }

        $dials = Deals::deal($seller, $buyer, 1);
        if ($dials) {
            return $this->render('index');
        }

        throw new NotFoundHttpException('Неверные параметры договора');
    }

}
