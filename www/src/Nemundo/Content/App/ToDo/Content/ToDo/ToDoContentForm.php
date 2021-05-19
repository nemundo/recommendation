<?php

namespace Nemundo\Content\App\ToDo\Content\ToDo;

use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class ToDoContentForm extends AbstractContentForm
{
    /**
     * @var ToDoContentType
     */
    public $contentType;


    /**
     * @var BootstrapTextBox
     */
    private $todo;

    public function getContent()
    {

        $this->todo=new BootstrapTextBox($this);
        $this->todo->label='To Do';
        $this->todo->validation=true;

        return parent::getContent();
    }

    public function onSubmit()
    {

$this->contentType->todo=$this->todo->getValue();
        $this->contentType->saveType();
    }
}