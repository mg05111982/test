<?php

use yii\db\Migration;

/**
 * Class m210514_121245_table_tenders_sellers
 */
class m210514_121245_table_tenders_sellers extends Migration
{
    public $tableName = 'tenders_sellers';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'tender' => $this->integer(),
            'seller' => $this->integer(),
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
