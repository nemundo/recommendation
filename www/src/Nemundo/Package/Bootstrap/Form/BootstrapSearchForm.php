<?php

namespace Nemundo\Package\Bootstrap\Form;


use Nemundo\Admin\Com\Button\AdminSubmitButton;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapSubmitButton;

class BootstrapSearchForm extends SearchForm
{

    /**
     * @var BootstrapSubmitButton
     */
    public $submitButton;


    protected function loadContainer()
    {
        parent::loadContainer();

        $this->submitButton = new AdminSubmitButton();
        $this->submitButton->label = 'Suchen';
        //$this->submitButton->addCssClass('btn btn-primary');


    }

    public function getContent()
    {

        //$this->submitButton->content = 'Suchen';
        $this->addContainer($this->submitButton);

        return parent::getContent();
    }

}