<?php

use yii\db\Migration;

/**
 * Class m210324_072038_user
 */
class m210324_072038_user extends Migration
{
    public $tableName = 'user';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDb';

        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'active' => $this->integer(1),
            'email' => $this->string(128),
            'username' => $this->string(45),
            'password' => $this->string(45),
            'authKey' => $this->string(128),
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
