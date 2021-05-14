<?php

use yii\db\Migration;

/**
 * Class m210512_091205_table_seller
 */
class m210512_091205_table_seller extends Migration
{
    public $tableName = 'seller';

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