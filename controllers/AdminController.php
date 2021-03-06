<?php


namespace app\controllers;


use app\models\Posts;
use app\models\PostsSearch;
use app\models\User;
use app\models\UserSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class AdminController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index', []);

    }

    public function actionUserDelete($id) {
        $user = User::findOne(['id' => $id]);
        $user->delete();

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionUserActivate($id, $activate) {
        $user = User::findOne(['id' => $id]);
        $user->updateAttributes(['active' => $activate]);
        $user->save();

        return $this->redirect(Yii::$app->request->referrer);
    }

}