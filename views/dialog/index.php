<?php

use app\models\Dialogs;
use app\models\DialogsForm;

/** @var Dialogs $dialogs */
/** @var DialogsForm $dialogsForm */

echo $this->render('_panel', [
    'seller' => $dialogsForm->seller_id,
    'buyer' => $dialogsForm->buyer_id,
]);
?>
<h3>Диалог с партнером:</h3>
<?php

/** @var Dialogs $dialog */
foreach ($dialogs as $dialog):

?>
    <div class="<?= $dialog->direction ? 'text-left' : 'text-right' ?>">
        <?= $dialog->message; ?>
    </div>
<?php

endforeach;

echo $this->render('_form', [
    'dialogsForm' => $dialogsForm,
]);
