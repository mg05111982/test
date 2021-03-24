<?php

use app\models\Posts;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

/** @var $model Posts */

?>
<div class="post">
    <h4><?= Html::encode($model->subject) ?></h4>

    <?= HtmlPurifier::process($model->description) ?>

    <?php
        $content = Html::a('Подробнее', Url::to(['/news/' . $model->id]));
        $content .= ' ';
        $content .= $model->moderate ? Html::a('Скрыть', Url::to(['/news/disable/' . $model->id . '/' . 0])) : '';
        $content .= !$model->moderate ? Html::a('Показать', Url::to(['/news/disable/' . $model->id . '/' . 1])) : '';
        $content .= ' ';
        $content .= Html::a('Редактировать', Url::to(['/news/update/' . $model->id]));
        $content .= ' ';
        $content .= Html::a('Удалить', Url::to(['/news/delete/' . $model->id]));
    ?>

    <?= Html::tag('p', $content); ?>
    <?= Html::tag('hr'); ?>
</div>