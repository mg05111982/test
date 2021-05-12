<?php

namespace app\controllers;

use app\models\PostsSearch;
use app\models\RegistrationForm;
use Yii;
use yii\base\BaseObject;
use yii\base\Exception;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
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

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect('/sign-in');
        }

        if (Yii::$app->user->can('admin')) {
            $this->redirect('/admin');
        }

        $searchModel = new PostsSearch();
        $provider = $searchModel->search(Yii::$app->request->queryParams);
        $provider->pagination = new Pagination([
            'pageSize' => 10,
        ]);

        return $this->render('index', [
            'provider' => $provider,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionSignIn()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->go();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Registration action.
     *
     * @return Response|string
     * @throws Exception
     */
    public function actionSignUp()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegistrationForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->go();
        }

        $model->password = '';
        return $this->render('registration', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function go($defaultUrl = '/')
    {
        if (Yii::$app->user->can('admin')) {
            $url = '/admin';
        } else if (Yii::$app->user->can('moderator')) {
            $url = '/moderator';
        } else {
            $url = $defaultUrl;
        }

        return $this->redirect($url);
    }
}
