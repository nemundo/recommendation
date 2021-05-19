<?php

namespace Nemundo\Package\Bootstrap\FormElement;


use Nemundo\Com\FormBuilder\Item\AbstractColorPicker;
use Nemundo\Com\FormBuilder\Item\AbstractFileUpload;
use Nemundo\Html\Form\Formatting\Label;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Package\Bootstrap\Utility\BootstrapSpacing;

class BootstrapColorPicker extends AbstractColorPicker
{

    public function getContent()
    {

        $this->prepareHtml();

        $this->tagName = 'div';
        $this->addCssClass(BootstrapSpacing::MARIGN_BOTTOM_3);
        $this->addCssClass('col');

        $label = new Label();
        $label->addCssClass('form-label');
        $label->content = $this->getLabelText();

        $this->colorInput->addCssClass('form-control');

        if ($this->showErrorMessage) {

            $bold = new Bold();
            $bold->addCssClass('form-control-label');
            $bold->content = $this->errorMessage;

            $label->content .= ' ' . $bold->getBodyContent();
            $this->addCssClass('has-danger');
            $this->fileInput->addCssClass('form-control-danger');

        }

        $this->addContainer($label);
        $this->addContainer($this->colorInput);

        return parent::getContent();

    }

}