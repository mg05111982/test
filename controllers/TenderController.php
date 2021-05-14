<?php

namespace app\controllers;

use app\models\Participate;
use app\models\Tenders;
use Yii;

class TenderController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new Tenders();

        if ($model->load(Yii::$app->request->post()) && $model->save(true)) {
            Yii::$app->session->setFlash('success', 'Тендер создан');
        }

        $tenders = Tenders::find()->all();

        if (Yii::$app->user->can('buyer')) {
            $tenders = Tenders::find()->where(['buyer' => Yii::$app->user->id])->all();
        }

        return $this->render('index', [
            'model' => $model,
            'tenders' => $tenders,
        ]);
    }

    public function actionParticipate($tender, $seller)
    {
        $participate = new Participate([
            'tender' => $tender,
            'seller' => $seller,
        ]);

        if ($participate->save()) {
            Yii::$app->session->setFlash('success', 'Участие зарегистрировано');
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionDelete($id)
    {
        Tenders::deleteAll(['id' => $id]);

        return $this->redirect(Yii::$app->request->referrer);
    }

}
