<?php

namespace Nemundo\Content\App\File\Content\File;


use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Content\Form\AbstractContentFormPart;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload;

abstract class AbstractFileContentFormPart extends AbstractContentFormPart
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

        parent::loadContainer();

        $this->file = new BootstrapFileUpload($this);
        $this->file->label = $this->label;  // 'File';
        $this->file->validation = true;
        $this->file->multiUpload = false;

       // parent::loadContainer();

    }


    protected function loadUpdateForm()
    {


    }


    public function saveData()
    {

        $this->contentType->file->fromFileRequest($this->file->getFileRequest());
        $this->contentType->saveType();

        //return $this->contentType->getDataId();
        return $this->contentType->getContentId();

    }

}