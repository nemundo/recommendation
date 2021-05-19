<?php

namespace Nemundo\Package\Bootstrap\FormElement;


use Nemundo\Html\Form\Input\InputType;

class BootstrapPasswordTextBox extends BootstrapTextBox
{

    protected function loadContainer()
    {

        parent::loadContainer();
        $this->inputType = InputType::PASSWORD;

    }

}