<?php

use app\models\Posts;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

/** @var $post Posts */

?>
<div class="post">
    <h3><?= Html::encode($post->subject) ?></h3>

    <?= HtmlPurifier::process($post->post) ?>

</div>