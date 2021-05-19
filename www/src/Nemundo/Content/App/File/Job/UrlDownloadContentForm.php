<?php

namespace Nemundo\Content\App\File\Job;


use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class UrlDownloadContentForm extends AbstractContentForm
{

    /**
     * @var UrlDownloadJob
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $url;

    public function getContent()
    {

        $this->url = new BootstrapTextBox($this);
        $this->url->label = 'Download Url';
        $this->url->validation = true;

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $this->contentType->url = $this->url->getValue();
        $this->contentType->saveType();

    }

}