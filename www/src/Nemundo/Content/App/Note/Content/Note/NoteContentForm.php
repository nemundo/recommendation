<?php

namespace Nemundo\Content\App\Note\Content\Note;

use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class NoteContentForm extends AbstractContentForm
{

    /**
     * @var NoteContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $noteTitle;

    /**
     * @var BootstrapLargeTextBox
     */
    private $text;


    public function getContent()
    {

        $this->noteTitle = new BootstrapTextBox($this);
        $this->noteTitle->label = 'Title';
        $this->noteTitle->validation = true;

        $this->text = new BootstrapLargeTextBox($this);


        return parent::getContent();
    }


    protected function loadUpdateForm()
    {

        $noteRow = $this->contentType->getDataRow();
        $this->noteTitle->value = $noteRow->title;
        $this->text->value = $noteRow->text;

    }


    public function onSubmit()
    {

        $this->contentType->title = $this->noteTitle->getValue();
        $this->contentType->text = $this->text->getValue();
        $this->contentType->saveType();

    }

}