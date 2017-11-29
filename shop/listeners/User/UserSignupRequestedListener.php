<?php

namespace shop\listeners\User;

use shop\entities\User\events\UserSignUpRequested;
use yii\mail\MailerInterface;

class UserSignupRequestedListener
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function handle(UserSignUpRequested $event): void
    {
        $dkim = \Yii::$app->params['dkim'];
        $signer = new \Swift_Signers_DKIMSigner(trim($dkim['privateKey']), trim($dkim['domainName']), trim($dkim['selector']));
        $sent = $this->mailer
            ->compose(
                ['html' => 'auth/signup/confirm-html', 'text' => 'auth/signup/confirm-text'],
                ['user' => $event->user]
            )
            ->setTo($event->user->email)
            ->setSubject('Подтверждение регистрации ' . \Yii::$app->name);
        $sent->getSwiftMessage()->attachSigner($signer);
        $sent->send();
        if (!$sent) {
            throw new \RuntimeException('Sending error.');
        }
    }
}