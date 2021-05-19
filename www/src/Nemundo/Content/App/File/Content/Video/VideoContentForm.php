<?php

namespace Nemundo\Content\App\File\Content\Video;

use Nemundo\Content\App\File\Content\File\AbstractFileContentForm;
use Nemundo\Html\Form\Input\AcceptFileType;

class VideoContentForm extends AbstractFileContentForm
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

}