<?php

namespace Nemundo\Content\App\IssueTracker\Content\Priority;

use Nemundo\Content\Com\Input\ContentTypeHiddenInput;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class PriorityContentForm extends AbstractContentForm
{

    /**
     * @var BootstrapTextBox
     */
    private $prioirty;

    /**
     * @var PriorityContentType
     */
    public $contentType;

    public function getContent()
    {

        $this->prioirty=new BootstrapTextBox($this);
        $this->prioirty->label='Priority';
        $this->prioirty->validation=true;


        new ContentTypeHiddenInput($this);

        return parent::getContent();
    }

    public function onSubmit()
    {

        $this->contentType->priority=$this->prioirty->getValue();
        $this->contentType->saveType();
    }
}