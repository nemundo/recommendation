<?php

namespace Nemundo\Content\App\Message\Content\Message;

use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\User\Com\ListBox\UserListBox;

class MessageContentForm extends AbstractContentForm
{
    /**
     * @var MessageContentType
     */
    public $contentType;

    /**
     * @var UserListBox
     */
    private $to;

    /**
     * @var BootstrapLargeTextBox
     */
    private $message;


    public function getContent()
    {

        $this->to = new UserListBox($this);

        $this->message = new BootstrapLargeTextBox($this);
        $this->message->label = 'Message';

        $this->submitButton->label = 'Send';

        return parent::getContent();

    }

    public function onSubmit()
    {
        $this->contentType->message=$this->message->getValue();
        $this->contentType->saveType();
    }

}