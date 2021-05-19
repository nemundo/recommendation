<?php

namespace Nemundo\Content\App\WebRadio\Content\WebRadio;

use Nemundo\Content\App\WebRadio\Data\WebRadio\WebRadioModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class WebRadioContentForm extends AbstractContentForm
{
    /**
     * @var WebRadioContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $webRadio;

    /**
     * @var BootstrapTextBox
     */
    private $streamUrl;

    public function getContent()
    {

        $model = new WebRadioModel();

        $this->webRadio = new BootstrapTextBox($this);
        $this->webRadio->label = $model->webRadio->label;
        $this->webRadio->validation = true;

        $this->streamUrl = new BootstrapTextBox($this);
        $this->streamUrl->label = $model->streamUrl->label;
        $this->streamUrl->validation = true;

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $webRadioRow=$this->contentType->getDataRow();

        $this->webRadio->value=$webRadioRow->webRadio;
        $this->streamUrl->value=$webRadioRow->streamUrl;

    }


    public function onSubmit()
    {

        $this->contentType->webRadio = $this->webRadio->getValue();
        $this->contentType->streamUrl = $this->streamUrl->getValue();
        $this->contentType->saveType();

    }
}