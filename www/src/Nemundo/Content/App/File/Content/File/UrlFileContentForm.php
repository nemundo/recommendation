<?php

namespace Nemundo\Content\App\File\Content\File;

use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class UrlFileContentForm extends AbstractContentForm
{

    /**
     * @var FileContentType
     */
    public $contentType;

    public $formName = 'From Url';

    /**
     * @var BootstrapTextBox
     */
    private $url;

    public function getContent()
    {

        $this->url = new BootstrapTextBox($this);
        $this->url->label = 'Url';
        $this->url->validation = true;

        return parent::getContent();
    }


    protected function onSubmit()
    {

        $this->contentType->file->fromUrl($this->url->getValue());
        $this->contentType->saveType();

    }

}