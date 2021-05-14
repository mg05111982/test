<?php

use yii\db\Migration;

/**
 * Class m210514_100445_tenders
 */
class m210514_100445_tenders extends Migration
{
    public $tableName = 'tenders';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'buyer' => $this->integer(),
            'description' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }

}
