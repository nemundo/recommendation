<?php

namespace Nemundo\Package\Bootstrap\FormElement;


use Nemundo\Html\Form\Button\SubmitButton;
use Nemundo\Package\Bootstrap\Button\BootstrapButtonSize;

class BootstrapSubmitButton extends SubmitButton
{

    /**
     * @var BootstrapButtonSize
     */
    public $size;

    public function getContent()
    {
        $this->addCssClass('btn btn-primary');

        if ($this->size !== null) {
            $this->addCssClass($this->size);
        }

        return parent::getContent();
    }

}