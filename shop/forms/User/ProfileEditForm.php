<?php

namespace shop\forms\User;

use shop\entities\User\User;
use yii\base\Model;

class ProfileEditForm  extends Model
{
    public $phone;
    public $email;
    public $name;
    public $surname;

    public $_user;

    public function __construct(User $user, $config = [])
    {
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->name = $user->name;
        $this->surname = $user->surname;
        $this->_user = $user;
        parent::__construct($config);
    }

    public function beforeValidate()
    {
        $this->phone = mb_substr(preg_replace('/[^\d]/', '', $this->phone),1);
        //$this->phone = preg_replace('/[^\d]/', '', $this->phone);
        return parent::beforeValidate();
    }

    public function afterValidate()
    {
        $this->phone = preg_replace('/[^\d]/', '', $this->phone);
        //$this->phone = mb_substr(preg_replace('/[^\d]/', '', $this->phone),1);
        parent::afterValidate();
    }

    public function rules(): array
    {
        return [
            [['name','surname'], 'trim'],
            // ['username', 'required'],
            [['name','surname'], 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'email_valid'],
            ['phone', 'required'],
            ['phone','match', 'pattern' => '/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/'],
        ];
    }

    public function email_valid()
    {
       if ($this->email == $this->_user->email)
           $this->email = $this->_user->email;
       else
           if(User::find()->where(['email' => $this->email])->one())
               $this->addError('email','Такой Email зарегистрирован.');
    }
/*
    public function phone_valid()
    {
            if(User::find()->where(['phone' => $this->phone])->one())
                $this->addError('email','Такой телефон зарегистрирован в системе');
    }
*/
}