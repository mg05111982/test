<?php

use yii\bootstrap\Tabs;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $provider ActiveDataProvider */

?>

<div class="site-index">

    <?=
    Tabs::widget([
        'items' => [
            [
                'label' => 'Новости',
                'content' => $this->render('news', ['provider' => $provider]),
            ],
            [
                'label' => 'Добавить новость',
                'content' => $this->render('append'),
            ],
        ],
        'options' => [
            'style' => 'margin-bottom: 25px;'
        ]
    ]);
    ?>

</div>
