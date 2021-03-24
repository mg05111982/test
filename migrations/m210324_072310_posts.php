<?php

use yii\db\Migration;

/**
 * Class m210324_072310_posts
 */
class m210324_072310_posts extends Migration
{
    public $tableName = 'posts';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDb';

        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'moderate' => $this->integer(1),
            'subject' => $this->string(128),
            'description' => $this->string(512),
            'post' => $this->string(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }

}
