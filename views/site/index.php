<?php

use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $provider ActiveDataProvider */
/* @var $partner [] */


$this->title = 'Последние новости!';

?>

<div class="site-index">
<?php
    foreach ($partner as $p):
?>
        <a href="dialog/<?= $p->user_id?>"><?= $p->services->name?></a><br />
<?php
    endforeach;
?>
</div>
