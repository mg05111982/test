<?php


namespace app\controllers;


use app\models\Posts;
use app\models\PostsSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class ModeratorController extends Controller
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
                        'actions' => ['index', 'disable', 'delete'],
                        'allow' => true,
                        'roles' => ['moderator'],
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
        $provider = PostsSearch::search();
        $provider->pagination = new Pagination([
            'pageSize' => 10,
        ]);

        return $this->render('index', [
            'provider' => $provider,
        ]);
    }
}