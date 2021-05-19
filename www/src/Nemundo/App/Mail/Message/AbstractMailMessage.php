<?php

namespace Nemundo\App\Mail\Message;

use Nemundo\App\Mail\Application\MailApplication;
use Nemundo\App\SystemLog\Message\SystemLogMessage;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Http\Response\ContentType;
use Nemundo\Core\Validation\EmailValidation;


abstract class AbstractMailMessage extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $text;

    /**
     * @var string
     */
    public $from;

    /**
     * @var string
     */
    public $fromText;

    //public $imagePath;

    public $contentType = ContentType::HTML;


    protected $toList = [];

    protected $ccList = [];

    protected $bccList = [];

    protected $attachmentList = [];


    abstract public function sendMail();


    public function addTo($email)
    {

        if ($this->validateEmail($email)) {
            $this->toList[] = $email;
        }

        /*
        if ((new EmailValidation())->isEmail($email)) {
            $this->toList[] = $email;
        } else {
            (new SystemLogMessage())->logError('eMail is not valid: ' . $email);
        }*/

        return $this;

    }

    public function addCc($email)
    {

        if ($this->validateEmail($email)) {
            $this->ccList[] = $email;
        }

        /*  if ((new EmailValidation())->isEmail($email)) {
              $this->ccList[] = $email;
          } else {
              (new SystemLog())->logError('eMail is not valid: ' . $email);
          }*/

    }

    public function addBcc($email)
    {

        if ($this->validateEmail($email)) {
            $this->bccList[] = $email;
        }

    }


    public function addAttachment($filename)
    {

        $this->attachmentList[] = $filename;
        return $this;

    }


    private function validateEmail($email)
    {

        $returnValue = true;

        if (!(new EmailValidation())->isEmail($email)) {
            $returnValue = true;
            (new SystemLogMessage(new MailApplication()))->logError('eMail is not valid: ' . $email);
        }

        return $returnValue;

    }

}
