<?php

namespace Nemundo\App\Mail\Message;


use Nemundo\App\Mail\Data\MailQueue\MailQueue;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Validation\EmailValidation;


class MailMessage extends AbstractBase
{

    /**
     * @var string
     */
    public $mailTo;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $text;


    public function sendMail()
    {

        if (!(new EmailValidation())->isEmail($this->mailTo)) {
            (new LogMessage())->writeError('MailMessage: No valid eMail ' . $this->mailTo);
            return;
        }


        $data = new MailQueue();
        $data->mailTo = $this->mailTo;
        $data->subject = $this->subject;
        $data->text = $this->text;
        $data->send = false;
        $data->save();

    }

}
