<?php

namespace Nemundo\App\Mail\Message;


use Nemundo\Core\Log\LogMessage;

class PhpHtmlMailMessage extends MailMessage
{

    /**
     * @var string
     */
    public $fromText;

    /**
     * @var string
     */
    public $fromMail;

    /**
     * @var string
     */
    public $bcc;

    public function sendMail()
    {

        $header = "From: " . $this->fromText . '<' . $this->fromMail . ">\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html; charset=UTF-8\r\n";

        if ($this->bcc !== null) {
            $header .= "BCC: " . $this->bcc . "\r\n";
        }

        if (!mail($this->mailTo, $this->subject, $this->text, $header)) {
            (new LogMessage())->writeError('Mail Error');
        }

    }

}