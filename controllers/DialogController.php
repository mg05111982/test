<?php

namespace app\controllers;

use app\models\Dialogs;
use app\models\DialogsForm;
use Yii;
use yii\base\BaseObject;

class DialogController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $dialogsForm = new DialogsForm();

        if (Yii::$app->user->can('seller')) {
            $dialogsForm = new DialogsForm([
                'buyer_id' => $id,
                'seller_id' => Yii::$app->user->id,
                'direction' => 1,
            ]);
        } else if(Yii::$app->user->can('buyer')) {
            $dialogsForm = new DialogsForm([
                'seller_id' => $id,
                'buyer_id' => Yii::$app->user->id,
                'direction' => 1,
            ]);
        }

        $dialogs = Dialogs::find()
            ->distinct()
            ->andWhere(['or',
                ['buyer_id' => $id],
                ['seller_id' => $id]
            ])
            ->all();

        return $this->render('index', [
            'dialogsForm' => $dialogsForm,
            'dialogs' => $dialogs,
        ]);
    }

    public function actionAppend()
    {
        $model = new DialogsForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Сообщение добавлено');
        } else {
            Yii::$app->session->setFlash('error', 'Ошибка добавления сообщения');
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

}
