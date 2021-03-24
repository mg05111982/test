<?php

use yii\helpers\Html;
use yii\helpers\Url;

echo Html::a('Добавить', Url::to(['news/create']), ['class' => 'btn btn-primary']);