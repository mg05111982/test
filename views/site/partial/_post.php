<?php

use app\models\Posts;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

/** @var $model Posts */

?>
<div class="post">
    <h3><?= Html::encode($model->subject) ?></h3>

    <?= HtmlPurifier::process($model->description) ?>

    <?= Html::tag('p', Html::a('Подробнее', Url::to(['/news/' . $model->id]))); ?>
</div>