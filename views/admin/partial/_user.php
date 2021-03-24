<?php

use app\models\Posts;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

/** @var $model Posts */

?>
<div class="post">
    <h4><?= Html::encode($model->username) . ' (' . Html::encode($model->email) . ')' ?></h4>

    <?php
        $content = $model->active ? Html::a('Заблокировать', Url::to(['/user/activate/' . $model->id . '/' . 0])) : '';
        $content .= !$model->active ? Html::a('Активировать', Url::to(['/user/activate/' . $model->id . '/' . 1])) : '';
        $content .= ' ';
        $content .= Html::a('Удалить', Url::to(['/user/delete/' . $model->id]));
    ?>

    <?= Html::tag('p', $content); ?>
    <?= Html::tag('hr'); ?>
</div>