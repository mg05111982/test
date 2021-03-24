<?php

/* @var $this yii\web\View */

use yii\bootstrap\Tabs;
use yii\data\ActiveDataProvider;

/** @var $provider ActiveDataProvider */
/** @var $userProvider ActiveDataProvider */

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
                [
                    'label' => 'Пользователи',
                    'content' => $this->render('users', ['provider' => $userProvider]),
                ],
            ],
            'options' => [
                'style' => 'margin-bottom: 25px;'
            ]
        ]);
    ?>
</div>
