<?php

use yii\db\Migration;

/**
 * Class m210324_074254_seed_user_admin
 */
class m210324_074254_seed_user_admin extends Migration
{
    public $tableName = 'user';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert($this->tableName, [
            'id' => 1,
            'active' => 1,
            'email' => 'admin@example.com',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => Yii::$app->security->generateRandomString(128),
        ]);

        $auth = Yii::$app->authManager;
        $role = $auth->getRole('admin');

        $auth->assign($role, 1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }

}
