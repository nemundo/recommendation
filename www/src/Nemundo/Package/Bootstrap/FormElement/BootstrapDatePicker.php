<?php

namespace Nemundo\Package\Bootstrap\FormElement;

use Nemundo\Com\FormBuilder\Item\AbstractDatePicker;
use Nemundo\Html\Form\Formatting\Label;
use Nemundo\Html\Formatting\Bold;

class BootstrapDatePicker extends AbstractDatePicker
{

    use BootstrapFormStyle;

    public function getContent()
    {

        $this->prepareHtml();
        $this->loadStyle();;

        $this->tagName = 'div';

        $this->textInput->addCssClass('form-control');

        $label = new Label();
        $label->id = 'label_' . $this->name;
        $label->addCssClass('form-label');
        $label->content = $this->getLabelText();

        if ($this->showErrorMessage) {

            $bold = new Bold();
            $bold->addCssClass('form-control-label');
            $bold->content = $this->errorMessage;

            $label->content .= ' ' . $bold->getContent()->bodyContent;
            $this->addCssClass('has-danger');
            $this->textInput->addCssClass('form-control-danger');

        }

        $this->addContainer($label);
        $this->addContainer($this->textInput);

        return parent::getContent();

    }

}