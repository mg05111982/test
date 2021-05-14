<?php

use app\models\Tenders;

/* @var $this yii\web\View */
/* @var $model Tenders */
/* @var $tenders Tenders[]|null */

if (Yii::$app->user->can('buyer')) {
    echo $this->render('_form', [
        'model' => $model,
    ]);
}

foreach ($tenders as $tender):
?>
    <hr />
    <div class="text-left"><?= $tender->description; ?></div>
    <?php
        if (Yii::$app->user->can('buyer')):
    ?>
        <div class="text-left"><a href="tender/delete/<?= $tender->id; ?>">Удалить</a></div>
    <?php
        elseif (Yii::$app->user->can('seller')):
    ?>
        <div class="text-left"><a href="tender/participate/<?= $tender->id; ?>/<?= Yii::$app->user->id ?>">Учавствовать</a></div>
    <?php
        endif;
    ?>
<?php
endforeach;
