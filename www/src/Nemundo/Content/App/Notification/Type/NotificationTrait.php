<?php


namespace Nemundo\Content\App\Notification\Type;


use Nemundo\App\Mail\Message\MailMessage;

trait NotificationTrait
{


    protected function sendEmailNotification($email, $subject, $message)
    {

        $mailMessage = new MailMessage();
        $mailMessage->mailTo = $email;
        $mailMessage->subject = $subject;
        $mailMessage->text = $message;
        $mailMessage->sendMail();

    }


}