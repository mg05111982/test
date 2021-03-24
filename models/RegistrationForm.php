<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\base\Model;

/**
 * Class RegistrationForm
 * @package app\models
 */
class RegistrationForm extends Model
{
    public $email;
    public $username;
    public $password;
    public $role = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            //email
            ['email', 'validateEmail'],
            // rememberMe must be a boolean value
            ['role', 'string'],
        ];
    }

    public function validateEmail($attribute, $params) {
        if (!preg_match('/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/', $this->email)) {
            $this->addError($attribute, 'You email is invalid');
        }
    }

    /**
     * @return bool|null
     * @throws Exception
     */
    public function save()
    {
        if ($this->validate()) {
            $user = new User([
                'active' => 1,
                'email' => $this->email,
                'username' => $this->username,
                'password' => $this->password,
                'authKey' => Yii::$app->security->generateRandomString(128),
            ]);

            if ($user->save()) {
                $auth = Yii::$app->authManager;
                $role = $auth->getRole($this->role);

                $auth->assign($role, $user->id);

                return Yii::$app->user->login($user, 3600*24*30);
            }

            return null;
        }

        return false;
    }

}
