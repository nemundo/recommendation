<?php

namespace Nemundo\Content\App\File\Content\Image;

use Nemundo\Content\App\File\Content\File\AbstractFileContentForm;
use Nemundo\Html\Form\Input\AcceptFileType;

class ImageContentForm extends AbstractFileContentForm
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