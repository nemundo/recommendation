<?php

namespace Nemundo\Content\App\File\Content\Upload;

use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\Dropzone\DropzoneFileRequest;

class UrlUploadContentForm extends AbstractContentForm
{

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

        $upload = new UploadFile();
        //$upload->parentId = $this->contentType->getParentId();
        $upload->file->fromUrl($this->url->getValue());
        $upload->uploadFile();

        //


    }

}