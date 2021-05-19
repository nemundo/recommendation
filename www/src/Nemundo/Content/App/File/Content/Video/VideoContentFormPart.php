<?php

namespace Nemundo\Content\App\File\Content\Video;

use Nemundo\Content\App\File\Content\File\AbstractFileContentForm;
use Nemundo\Content\App\File\Content\File\AbstractFileContentFormPart;
use Nemundo\Content\Form\AbstractContentFormPart;
use Nemundo\Html\Form\Input\AcceptFileType;

class VideoContentFormPart extends AbstractFileContentFormPart
{
    /**
     * @var VideoContentType
     */
    public $contentType;

    public function getContent()
    {
        $this->file->acceptFileType = AcceptFileType::VIDEO;
        return parent::getContent();
    }


    protected function loadUpdateForm()
    {

    }

}