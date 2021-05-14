<?php

use yii\db\Migration;

/**
 * Class m210512_092308_table_dialogs
 */
class m210512_092308_table_dialogs extends Migration
{
    public $tableName = 'dialogs';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'seller_id' => $this->integer(),
            'buyer_id' => $this->integer(),
            'direction' => $this->integer(),
            'message' => $this->string(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }

}
