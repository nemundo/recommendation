<?php

namespace Nemundo\Content\App\File\Com\Form;


use Nemundo\Content\App\File\Site\FileUploadSite;
use Nemundo\Package\Dropzone\DropzoneUploadForm;

class FileContentDropzoneUploadForm extends DropzoneUploadForm
{

    public function getContent()
    {

        $this->uploadSite = FileUploadSite::$site;
        return parent::getContent();

    }

}