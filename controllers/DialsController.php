<?php

namespace app\controllers;

use app\models\Dials;
use yii\web\NotFoundHttpException;

class DialsController extends \yii\web\Controller
{
    public function actionIndex($seller, $buyer)
    {
        if (!isset($seller, $buyer)) {
            throw new NotFoundHttpException('Неверные параметры договора');
        }

        $dials = Dials::dial($seller, $buyer, 1);
        if ($dials) {
            return $this->render('index');
        }

        throw new NotFoundHttpException('Неверные параметры договора');
    }

}
