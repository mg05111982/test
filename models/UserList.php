<?php


namespace app\models;


use Yii;

class UserList
{
    const CURRENT = 0;

    const ROLE_BUYER = 'buyer';
    const ROLE_SELLER = 'seller';

    public $authManager;

    public function __construct()
    {
        $this->authManager = Yii::$app->authManager;
    }

    public function userList()
    {
        $role = $this->getUserRole();
        $ids = $this->authManager->getUserIdsByRole($role);

        $query = $role == self::ROLE_SELLER ? Seller::find() : Buyer::find();

        return $query->andWhere(['IN', 'user_id', $ids])
            ->all();
    }

    public function getUserRole()
    {
        $roles = $this->authManager->getRolesByUser(Yii::$app->user->getId());
        $role = current($roles);

        return $role->name == self::ROLE_BUYER ? self::ROLE_SELLER : self::ROLE_BUYER;
    }


}