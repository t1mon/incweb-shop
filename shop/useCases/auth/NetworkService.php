<?php

namespace shop\useCases\auth;

use shop\access\Rbac;
use shop\entities\User\User;
use shop\repositories\UserRepository;
use shop\services\RoleManager;
use shop\services\TransactionManager;

class NetworkService
{
    private $users;
    private $transaction;
    private $roles;

    public function __construct(UserRepository $users, TransactionManager $transaction, RoleManager $roles)
    {
        $this->users = $users;
        $this->transaction = $transaction;
        $this->roles = $roles;
    }

    public function auth($network, $identity, $accessToken, $attributes): User
    {
        if ($user = $this->users->findByNetworkIdentity($network, $identity)) {
            return $user;
        }
        $user = User::signupByNetwork($network, $identity, $accessToken ,$attributes);
        $this->transaction->wrap(function () use ($user) {
            $this->users->save($user);
            $this->roles->assign($user->id, Rbac::ROLE_USER);
        });
        return $user;
    }

    public function attach($id, $network, $identity): void
    {
        if ($this->users->findByNetworkIdentity($network, $identity)) {
            throw new \DomainException('Network is already signed up.');
        }
        $user = $this->users->get($id);
        $user->attachNetwork($network, $identity);
        $this->users->save($user);
    }
}