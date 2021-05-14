<?php

use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $provider ActiveDataProvider */
/* @var $partner [] */


$this->title = 'Последние новости!';

?>

<div class="site-index">
    <div class="row">
        <div class="d-flex">
            <div class="col-md-7"><h3>Список партнеров:</h3></div>
            <div class="col-md-4"><a href="tender">Конкурсные закупки</a></div>
        </div>
    </div>
<?php
    foreach ($partner as $p):
?>
        <a href="dialog/<?= $p->user_id?>"><?= $p->services->name?></a><br />
<?php
    endforeach;
?>
</div>
