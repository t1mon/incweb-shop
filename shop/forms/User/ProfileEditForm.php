<?php

namespace shop\forms\User;

use shop\entities\User\User;
use yii\base\Model;

class ProfileEditForm  extends Model
{
    public $phone;
    public $email;

    public $_user;

    public function __construct(User $user, $config = [])
    {
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->_user = $user;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['phone', 'email'], 'required'],
            ['email', 'email'],
            [['email'], 'string', 'max' => 255],
            ['phone','match', 'pattern' => '/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/'],
            [['phone', 'email'], 'unique', 'targetClass' => User::class, 'filter' => ['<>', 'id', $this->_user->id]],
        ];
    }
}