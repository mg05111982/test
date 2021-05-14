<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $dialogsForm \app\models\Dialogs */

?>

<div class="buyer-form">

    <?php $form = ActiveForm::begin([
        'action' => Url::to(['dialog/append'])
    ]); ?>

    <?= $form->field($dialogsForm, 'direction')->hiddenInput()->label(false); ?>
    <?= $form->field($dialogsForm, 'seller_id')->hiddenInput()->label(false); ?>
    <?= $form->field($dialogsForm, 'buyer_id')->hiddenInput()->label(false); ?>

    <?= $form->field($dialogsForm, 'message')->textInput(); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
