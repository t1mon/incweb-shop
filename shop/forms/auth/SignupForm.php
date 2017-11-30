<?php
namespace shop\forms\auth;

use yii\base\Model;
use shop\entities\User\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $phone;
    public $password;
    public $name;
    public $surname;

    /**
     * @inheritdoc
     */
    public function beforeValidate()
    {
        $this->phone = preg_replace('/[^\d]/', '', $this->phone);
        return parent::beforeValidate();
    }

    public function afterValidate()
    {   $this->phone = mb_substr(preg_replace('/[^\d]/', '', $this->phone),1);
        parent::afterValidate();
    }

    public function rules()
    {
        return [
            [['username','name','surname'], 'trim'],
           // ['username', 'required'],
            ['username', 'unique', 'targetClass' => User::class, 'message' => 'Такое имя пользователя уже существует.'],
            [['username','name','surname'], 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => User::class, 'message' => 'Такой email уже зарегистрирован.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['phone', 'required'],
            ['phone','match', 'pattern' => '/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/'],
            ['phone', 'unique', 'targetClass' => User::class, 'message' => 'Такой телефон уже зарегистрирован.'],
        ];
    }
}
