<?php

use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $provider ActiveDataProvider */


$this->title = 'Последние новости!';
?>
<div class="site-index">

    <?= ListView::widget([
        'dataProvider' => $provider,
        'emptyText' => 'Нет добавленных новостей',
        'itemView' => 'partial/_post',
    ]); ?>

</div>
