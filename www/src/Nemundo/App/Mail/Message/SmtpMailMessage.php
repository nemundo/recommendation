<?php

namespace Nemundo\App\Mail\Message;

use Nemundo\App\Mail\MailConfig;
use Nemundo\Core\Log\LogMessage;


class SmtpMailMessage extends AbstractMailMessage
{

    /**
     * @var bool
     */
    public $sslEncryption = true;

    public function sendMail()
    {

        $encryption = null;
        if ($this->sslEncryption) {
            $encryption = 'ssl';
        }

        $transport = (new \Swift_SmtpTransport(MailConfig::$mailConnection->host, MailConfig::$mailConnection->port, $encryption));

        if (MailConfig::$mailConnection->authentication) {
            $transport->setUsername(MailConfig::$mailConnection->user);
            $transport->setPassword(MailConfig::$mailConnection->password);
        }

        $mailer = new  \Swift_Mailer($transport);
        $message = new \Swift_Message();

        foreach ($this->toList as $email) {
            $message->addTo($email);
        }

        foreach ($this->ccList as $email) {
            $message->addCc($email);
        }

        foreach ($this->bccList as $email) {
            $message->addBcc($email);
        }

        $message->setFrom(array(MailConfig::$defaultMailFrom => MailConfig::$defaultMailFromText));
        $message->setSubject($this->subject);

        // Text Body
        //$message->setBody(strip_tags($text));

        // Html Body
//        $message->setBody($this->text, 'text/html');
        $message->setBody($this->text, $this->contentType);

        foreach ($this->attachmentList as $filename) {
            $message->attach(\Swift_Attachment::fromPath($filename));
        }

        try {
            $mailer->send($message);
        } catch (\Exception $error) {
            (new LogMessage())->writeError($error);
        }

    }

}
