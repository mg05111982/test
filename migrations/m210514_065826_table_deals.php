<?php

use yii\db\Migration;

/**
 * Class m210514_065826_table_dials
 */
class m210514_065826_table_deals extends Migration
{
    public $tableName = 'deals';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'seller' => $this->integer(),
            'buyer' => $this->integer(),
            'confirm' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210514_065826_table_dials cannot be reverted.\n";

        return false;
    }
    */
}
