<?php

namespace Nemundo\Package\Bootstrap\FormElement;

use Nemundo\Com\FormBuilder\Item\AbstractNumberBox;
use Nemundo\Html\Form\Formatting\Label;
use Nemundo\Html\Formatting\Bold;

class BootstrapNumberBox extends AbstractNumberBox
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

        //$this->textInput= new NumberInput();
        $this->numberInput->addCssClass('form-control');

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
        $this->addContainer($this->numberInput);

        return parent::getContent();

    }

}