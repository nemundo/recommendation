<?php

namespace Nemundo\Content\App\File\Content\File;


use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload;

abstract class AbstractFileContentForm extends AbstractContentForm
{

    /**
     * @var AbstractFileContentType
     */
    public $contentType;

    /**
     * @var BootstrapFileUpload
     */
    protected $file;


    protected function loadContainer()
    {

        $this->file = new BootstrapFileUpload($this);
        $this->file->label = 'File';
        $this->file->validation = true;
        $this->file->multiUpload = false;

        parent::loadContainer();

    }


    protected function loadUpdateForm()
    {


    }


    public function onSubmit()
    {

        $this->contentType->file->fromFileRequest($this->file->getFileRequest());
        $this->contentType->saveType();

    }

}