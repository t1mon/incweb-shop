<?php
namespace shop\helpers;


use shop\repositories\UserRepository;
use yii\mail\MailerInterface;

class SendEmailHelper
{
    private $privateKey;
    private $domainName;
    private $selector;
    private $mailer;
    private $user;

    public function __construct($dkim, $user,  MailerInterface $mailer)
    {
        $this->privateKey = $dkim['privateKey'];
        $this->domainName = $dkim['domainName'];
        $this->selector = $dkim['selector'];
        $this->mailer = $mailer;
        $this->user = $user;
    }

    public function sendEmail(){
        $signer = new \Swift_Signers_DKIMSigner(trim($this->privateKey), trim($this->domainName), trim($this->selector));
        $sent = $this->mailer
            ->compose(
                ['html' => 'auth/reset/confirm-html', 'text' => 'auth/reset/confirm-text'],
                ['user' => $this->user]
            )
            ->setTo($this->user->email)
            ->setSubject('Сброс пароля ' . \Yii::$app->name);
        $sent->getSwiftMessage()->attachSigner($signer);
        $sent->send();

        if (!$sent) {
            throw new \RuntimeException('Sending error.');
        }

    }
}
