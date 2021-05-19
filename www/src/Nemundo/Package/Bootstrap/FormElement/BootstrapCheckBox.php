<?php

namespace Nemundo\Package\Bootstrap\FormElement;


use Nemundo\Com\FormBuilder\Item\AbstractCheckBox;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Html\Form\Formatting\Label;
use Nemundo\Package\Bootstrap\Utility\BootstrapSpacing;

class BootstrapCheckBox extends AbstractCheckBox
{

    public function getContent()
    {

        $this->prepareHtml();

        $this->tagName = 'div';
        $this->addCssClass('form-check');

        $this->addCssClass(BootstrapSpacing::MARIGN_BOTTOM_3);
        $this->addCssClass('col');

        $this->checkbox->addCssClass('form-check-input');

        $label = new Label($this);
        $label->content = $this->checkbox->getContent()->bodyContent . ' ' . $this->getLabelText();
        $label->addCssClass('form-check-label');
        $label->addCssClass('text-nowrap');

        if ($this->showErrorMessage) {

            $bold = new Bold();
            $bold->addCssClass('form-control-label');
            $bold->content = $this->errorMessage;

            $label->content .= ' ' . $bold->getContent()->bodyContent;
            $this->addCssClass('has-danger');
            $this->checkbox->addCssClass('form-control-danger');

        }

        return parent::getContent();

    }

}