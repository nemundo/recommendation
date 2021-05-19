<?php

namespace Nemundo\Srf\Widget\Content\ShowWidget;

use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Srf\Com\ListBox\ShowListBox;

class ShowWidgetContentForm extends AbstractContentForm
{

    /**
     * @var ShowWidgetContentType
     */
    public $contentType;

    /**
     * @var ShowListBox
     */
    private $show;

    /**
     * @var BootstrapTextBox
     */
    private $showLimit;

    public function getContent()
    {

        $this->show = new ShowListBox($this);
        $this->show->validation = true;

        $this->showLimit = new BootstrapTextBox($this);
        $this->showLimit->label = 'Limit';
        $this->showLimit->validation = true;
        $this->showLimit->value = 10;

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $row = $this->contentType->getDataRow();
        $this->show->value = $row->showId;
        $this->showLimit->value = $row->showLimit;

    }


    public function onSubmit()
    {

        $this->contentType->showId = $this->show->getValue();
        $this->contentType->showLimit = $this->showLimit->getValue();
        $this->contentType->saveType();

    }

}