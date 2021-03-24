<?php


namespace app\controllers;


use app\models\Notifications;
use app\models\PostForm;
use app\models\Posts;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class NewsController extends Controller
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
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['user', 'moderator', 'admin'],
                    ],
                    [
                        'actions' => ['disable', 'delete', 'update', 'create'],
                        'allow' => true,
                        'roles' => ['moderator', 'admin'],
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

    public function actionIndex($id)
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect('/sign-in');
        }

        $post = Posts::findOne(['id' => $id]);

        return $this->render('index', [
            'post' => $post,
        ]);
    }

    public function actionDisable($id, $moderate = 0) {

        $post = Posts::findOne(['id' => $id]);
        $post->updateAttributes(['moderate' => (int)$moderate]);
        $post->save();

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionDelete($id) {

        $post = Posts::findOne(['id' => $id]);
        $post->delete();

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionUpdate($id) {

        $model = new PostForm();

        if ($model->load(Yii::$app->request->post()) && $model->update($id)) {
            return $this->go();
        }

        $post = Posts::find()->where(['id' => $id])->asArray()->one();
        $model->load($post, '');

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionCreate() {

        $model = new PostForm();

        if ($model->load(Yii::$app->request->post()) && $model->create()) {
            Yii::$app->trigger(Notifications::NOTICE);
            return $this->go();
        }

        return $this->render('update', [
            'model' => $model,
        ]);
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