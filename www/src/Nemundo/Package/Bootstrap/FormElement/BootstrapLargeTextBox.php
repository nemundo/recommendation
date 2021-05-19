<?php

namespace Nemundo\Package\Bootstrap\FormElement;


use Nemundo\Com\FormBuilder\Item\AbstractLargeTextBox;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Html\Form\Formatting\Label;
use Nemundo\Core\Language\Translation;
use Nemundo\Package\Bootstrap\Utility\BootstrapSpacing;

class BootstrapLargeTextBox extends AbstractLargeTextBox
{

    /**
     * @var Label
     */
    protected $labelLabel;

    protected function loadContainer()
    {
        parent::loadContainer();
        $this->labelLabel = new Label();
        $this->rows = 10;
    }


    public function getContent()
    {

        $this->prepareHtml();

        $this->tagName = 'div';
        $this->addCssClass(BootstrapSpacing::MARIGN_BOTTOM_3);

        $this->textarea->addCssClass('form-control');

        $labelText = (new Translation())->getText($this->label);
        if ($this->validation) {
            $labelText .= ' *';
        }

        $this->labelLabel->addCssClass('form-label');
        $this->labelLabel->content = $labelText;

        if ($this->showErrorMessage) {

            $bold = new Bold();
            $bold->addCssClass('form-control-label');
            $bold->content = $this->errorMessage;

            $this->labelLabel->content .= ' ' . $bold->getContent()->bodyContent;
            $this->addCssClass('has-danger');
            $this->textarea->addCssClass('form-control-danger');

        }

        $this->addContainer($this->labelLabel);
        $this->addContainer($this->textarea);

        return parent::getContent();

    }

}