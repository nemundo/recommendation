<?php

namespace Nemundo\Package\Bootstrap\FormElement;

use Nemundo\Com\FormBuilder\Item\AbstractTextBox;
use Nemundo\Com\FormBuilder\Item\AbstractTimeTextBox;
use Nemundo\Html\Form\Formatting\Label;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Package\Bootstrap\Utility\BootstrapSpacing;

class BootstrapTimeTextBox extends AbstractTimeTextBox
{

    use BootstrapFormStyle;

    /**
     * @var Label
     */
    protected $labelLabel;


    protected function loadContainer()
    {
        parent::loadContainer();
        $this->labelLabel = new Label();
    }


    public function getContent()
    {

        $this->prepareHtml();
        $this->loadStyle();

        $this->textInput->addCssClass('form-control');

        $this->labelLabel->addCssClass('form-label');
        $this->labelLabel->content = $this->getLabelText();

        if ($this->showErrorMessage) {

            $bold = new Bold();
            $bold->addCssClass('form-control-label');
            $bold->content = $this->errorMessage;

            $this->labelLabel->content .= ' ' . $bold->getBodyContent();
            //$this->addCssClass('has-danger');
            //$this->textInput->addCssClass('form-control-danger');

        }

        $this->addContainer($this->labelLabel);
        $this->addContainer($this->textInput);

        return parent::getContent();

    }

}