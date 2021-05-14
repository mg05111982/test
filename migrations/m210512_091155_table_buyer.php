<?php

use yii\db\Migration;

/**
 * Class m210512_091155_table_buyer
 */
class m210512_091155_table_buyer extends Migration
{
    public $tableName = 'buyer';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11),
            'name' => $this->string(),
            'description' => $this->string(),
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
