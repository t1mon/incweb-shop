<?php

namespace shop\useCases\auth;

use shop\forms\auth\PasswordResetRequestForm;
use shop\forms\auth\ResetPasswordForm;
use shop\helpers\SendEmailHelper;
use shop\repositories\UserRepository;
use Yii;
use yii\mail\MailerInterface;

class PasswordResetService
{
    private $mailer;
    private $users;

    public function __construct(UserRepository $users, MailerInterface $mailer)
    {
        $this->mailer = $mailer;
        $this->users = $users;
    }

    public function request(PasswordResetRequestForm $form): void
    {
        $user = $this->users->getByEmail($form->email);

        if (!$user->isActive()) {
            throw new \DomainException('Вы не подтвердили свой Email.');
        }
        $user->requestPasswordReset();
        $this->users->save($user);
        $dkim = \Yii::$app->params['dkim'];
        $signer = new \Swift_Signers_DKIMSigner(trim($dkim['privateKey']), trim($dkim['domainName']), trim($dkim['selector']));

        $sent = $this->mailer
            ->compose(
                ['html' => 'auth/reset/confirm-html', 'text' => 'auth/reset/confirm-text'],
                ['user' => $user]
            )
            ->setTo($user->email)
            ->setSubject('Сброс пароля ' . Yii::$app->name);
        $sent->getSwiftMessage()->attachSigner($signer);
        $sent->send();

        if (!$sent) {
            throw new \RuntimeException('Sending error.');
        }
    }

    public function validateToken($token): void
    {
        if (empty($token) || !is_string($token)) {
            throw new \DomainException('Password reset token cannot be blank.');
        }
        if (!$this->users->existsByPasswordResetToken($token)) {
            throw new \DomainException('Wrong password reset token.');
        }
    }

    public function reset(string $token, ResetPasswordForm $form): void
    {
        $user = $this->users->getByPasswordResetToken($token);
        $user->resetPassword($form->password);
        $this->users->save($user);
    }
}