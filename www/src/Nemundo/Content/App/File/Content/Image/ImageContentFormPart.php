<?php

namespace Nemundo\Content\App\File\Content\Image;

use Nemundo\Content\App\File\Content\File\AbstractFileContentForm;
use Nemundo\Content\App\File\Content\File\AbstractFileContentFormPart;
use Nemundo\Content\Form\AbstractContentFormPart;
use Nemundo\Html\Form\Input\AcceptFileType;

class ImageContentFormPart extends AbstractFileContentFormPart
{
    /**
     * @var ImageContentType
     */
    public $contentType;

    public function getContent()
    {
        $this->file->acceptFileType = AcceptFileType::IMAGE;
        return parent::getContent();
    }


    protected function loadUpdateForm()
    {

    }

}