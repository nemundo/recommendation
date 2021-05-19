<?php

namespace Nemundo\Content\App\Text\Content\RichText;

use Nemundo\Package\Bootstrap\FormElement\BootstrapCkEditor5Editor;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Content\Form\AbstractContentForm;

class RichTextContentForm extends AbstractContentForm
{

    /**
     * @var BootstrapLargeTextBox
     */
    private $html;

    public function getContent()
    {

        $this->html = new BootstrapCkEditor5Editor($this);
        $this->html->label = 'Html';

        return parent::getContent();
    }


    protected function loadUpdateForm()
    {

        $largeTextRow = $this->contentType->getDataRow();
        $this->html->value = $largeTextRow->largeText;

    }

    protected function onSubmit()
    {

        $this->contentType->html = $this->html->getValue();
        $this->contentType->saveType();

    }

}