<?php

namespace shop\useCases\auth;

use shop\access\Rbac;
use shop\dispatchers\EventDispatcher;
use shop\entities\User\User;
use shop\forms\auth\SignupForm;
use shop\repositories\UserRepository;
use shop\services\RoleManager;
use shop\services\TransactionManager;
use yii\mail\MailerInterface;
use Yii;

class SignupService
{
    private $users;
    private $roles;
    private $transaction;
    private $mailer;

    public function __construct(
        UserRepository $users,
        RoleManager $roles,
        MailerInterface $mailer,
        TransactionManager $transaction
    )
    {
        $this->users = $users;
        $this->roles = $roles;
        $this->transaction = $transaction;
        $this->mailer = $mailer;
    }

    public function signup(SignupForm $form): void
    {
        $user = User::requestSignup(
            $form->username,
            $form->email,
            $form->phone,
            $form->password
        );
        $this->transaction->wrap(function () use ($user) {
            $this->users->save($user);
            $this->roles->assign($user->id, Rbac::ROLE_USER);
        });
        $dkim = \Yii::$app->params['dkim'];
        $signer = new \Swift_Signers_DKIMSigner(trim($dkim['privateKey']), trim($dkim['domainName']), trim($dkim['selector']));
        $sent = $this->mailer
            ->compose(
                ['html' => 'auth/signup/confirm-html', 'text' => 'auth/signup/confirm-text'],
                ['user' => $user]
            )
            ->setTo($user->email)
            ->setSubject('Подтверждение регистрации ' . Yii::$app->name);
        $sent->getSwiftMessage()->attachSigner($signer);
        $sent->send();
        if (!$sent) {
            throw new \RuntimeException('Sending error.');
        }
    }

    public function confirm($token): void
    {
        if (empty($token)) {
            throw new \DomainException('Empty confirm token.');
        }
        $user = $this->users->getByEmailConfirmToken($token);
        $user->confirmSignup();
        $this->users->save($user);
    }
}