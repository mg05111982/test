<?php

use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

/** @var $provider ActiveDataProvider */

?>

<div class="site-index">

    <?= ListView::widget([
        'dataProvider' => $provider,
        'emptyText' => 'Список пользователей пуст',
        'itemView' => 'partial/_user',
    ]); ?>

</div>