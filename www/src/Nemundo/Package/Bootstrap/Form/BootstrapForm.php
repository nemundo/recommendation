<?php

namespace Nemundo\Package\Bootstrap\Form;


use Nemundo\Com\FormBuilder\AbstractFormBuilder;
use Nemundo\Html\Form\Button\SubmitButton;
use Nemundo\Package\Bootstrap\FormElement\BootstrapSubmitButton;


class BootstrapForm extends AbstractFormBuilder
{

    /**
     * @var SubmitButton
     */
    public $submitButton;


    protected function loadContainer()
    {
        parent::loadContainer();

        $this->submitButton = new BootstrapSubmitButton();
        $this->submitButton->label = 'Speichern';
        $this->submitButton->addCssClass('btn btn-primary btn-sm');

    }


    public function getContent()
    {

        $this->addContainer($this->submitButton);
        return parent::getContent();

    }


    protected function onSubmit()
    {

    }

}