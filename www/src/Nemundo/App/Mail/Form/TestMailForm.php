<?php

namespace Nemundo\App\Mail\Form;


use Nemundo\App\Mail\Message\MailMessage;
use Nemundo\Core\Validation\ValidationType;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;


class TestMailForm extends BootstrapForm
{

    /**
     * @var BootstrapTextBox
     */
    private $mailTo;

    /**
     * @var BootstrapTextBox
     */
    private $subject;

    /**
     * @var BootstrapLargeTextBox
     */
    private $text;


    public function getContent()
    {

        $this->mailTo = new BootstrapTextBox($this);
        $this->mailTo->label = 'To';
        $this->mailTo->validation = true;
        $this->mailTo->validationType = ValidationType::IS_EMAIL;
        $this->mailTo->autofocus = true;
        $this->mailTo->value = 'test@test.ch';

        $this->subject = new BootstrapTextBox($this);
        $this->subject->label = 'Subject';
        $this->subject->validation = true;
        $this->subject->value = 'Test Mail';

        $this->text = new BootstrapLargeTextBox($this);
        $this->text->label = 'Text';
        $this->text->value = 'Test Mail';

        $this->submitButton->label = 'Send Mail';

        return parent::getContent();
    }


    protected function onSubmit()
    {

        $message = new MailMessage();
        $message->mailTo = $this->mailTo->getValue();
        $message->subject = $this->subject->getValue();
        $message->text = $this->text->getValue();
        $message->sendMail();

    }

}