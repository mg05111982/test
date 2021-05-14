<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Buyer */

$this->title = 'Создание покупателя';
$this->params['breadcrumbs'][] = ['label' => 'Покупатель', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="buyer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
