<?php

namespace Nemundo\Admin\Com\Form;


use Nemundo\Com\FormBuilder\AbstractFormBuilder;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Html\Form\Button\SubmitButton;


abstract class AbstractAdminForm extends AbstractFormBuilder
{

    /**
     * @var SubmitButton
     */
    public $submitButton;

    protected function loadContainer()
    {

        parent::loadContainer();

        $this->submitButton = new SubmitButton();
        $this->submitButton->addCssClass('btn btn-primary btn-sm');
        $this->submitButton->label = [];
        $this->submitButton->label[LanguageCode::EN] = 'Save';
        $this->submitButton->label[LanguageCode::DE] = 'Speichern';

    }


    public function getContent()
    {

        $this->addContainer($this->submitButton);
        return parent::getContent();

    }

}