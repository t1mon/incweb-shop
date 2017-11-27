<?php

namespace shop\useCases\auth;

use shop\forms\auth\PasswordResetRequestForm;
use shop\forms\auth\ResetPasswordForm;
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
            throw new \DomainException('User is not active.');
        }
//\Yii::$app->params[''];
        $user->requestPasswordReset();
        $this->users->save($user);
        $signer = new \Swift_Signers_DKIMSigner('-----BEGIN RSA PRIVATE KEY-----
MIICXQIBAAKBgQDrtvcGJuYU1l72M/wzHsBvTg+Gl6yhhSS1ehWLLQf5Xg2IoOGw
SzoKiN0gfihT/7+kqxvNV9JwBGDNmisXc4Db18Oe9yvyDSFFREHAjjPU0X+kTYJ3
hvdi8/T4/Uh203y8HGFBfNYtWBCqqVHiv6n6ntCffKC5amzdxyUBiZJeiwIDAQAB
AoGAVovscV7Q9e+sGFwICsEMyRFxU+rW4MthKhz0UhCrr9zfvT3NAAzu97U+89I+
fnEV7aFB6QiI5MZGwNcNYWPweJNoJ2toxXZZNdsSaMw4K4S8Apq0D9mlsie+k74Q
hetuUvSX+C8HEH6+rksrhvjeUZYP/NNqlUYbw8BaTh3GILkCQQD97BE8t5WuR8XZ
Jnxa9EbojkFDxuILx5S1z6uPab7iJPRulfTNzoLGJVocEb5tN0en2j8KN8znBixu
JLJCv7JXAkEA7aTBZ8Sp1HQmopWwEgCmdxTdC8+UL7WvhibMHn3U6Zsefeus9CWu
6aI8mw/BYKiGuYnyqVVUo05qqaGxwjVc7QJBAPQbqkaQx1kQruef1BUsma6gc6XQ
4Scp65EN4ISyyEtn84UMrJfeXGJZLlOly0f7yOtZKRmNo3LFwJjytlztJWkCQBRk
pxQ4lDpfHVGmds2UsLRXXgC9d4IAnWdtvOaA9dx2K0+zAcyRz0jNW1YTLA0XaThS
1jgh0nmRKSYVciOwYKECQQDiYFmgy6Z72bGgwZcQypwiHZ18Gy8bTZfOt2BZ1PeZ
qqk+116WF1IRGQN7btqOWckR5hGHlucXpKdUrNZoTnRH
-----END RSA PRIVATE KEY-----', 'mebel-style.online', 'mail');

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