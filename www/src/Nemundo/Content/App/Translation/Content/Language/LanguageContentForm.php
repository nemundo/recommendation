<?php

namespace Nemundo\Content\App\Translation\Content\Language;

use Nemundo\Content\App\Translation\Data\Language\LanguageModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class LanguageContentForm extends AbstractContentForm
{
    /**
     * @var LanguageContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $code;

    /**
     * @var BootstrapTextBox
     */
    private $language;

    /**
     * @var BootstrapCheckBox
     */
    private $defaultLanguage;


    public function getContent()
    {

        $model = new LanguageModel();

        $this->code = new BootstrapTextBox($this);
        $this->code->label = $model->code->label;
        $this->code->validation = true;

        $this->language = new BootstrapTextBox($this);
        $this->language->label = $model->language->label;
        $this->language->validation = true;

        $this->defaultLanguage = new BootstrapCheckBox($this);
        $this->defaultLanguage->label = $model->defaultLanguage->label;


        return parent::getContent();
    }


    protected function loadUpdateForm()
    {

        $languageRow = $this->contentType->getDataRow();
        $this->language->value = $languageRow->language;
        $this->code->value = $languageRow->code;
        $this->defaultLanguage->value = $languageRow->defaultLanguage;

    }


    public function onSubmit()
    {

        $this->contentType->code = $this->code->getValue();
        $this->contentType->language = $this->language->getValue();
        $this->contentType->defaultLanguage = $this->defaultLanguage->getValue();
        $this->contentType->saveType();

    }

}