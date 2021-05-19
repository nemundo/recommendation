<?php

namespace Nemundo\Content\App\File\Content\Audio;

use Nemundo\Content\App\File\Content\File\AbstractFileContentForm;
use Nemundo\Html\Form\Input\AcceptFileType;

class AudioContentForm extends AbstractFileContentForm
{
    /**
     * @var AudioContentType
     */
    public $contentType;

    public function getContent()
    {

        $this->file->acceptFileType = AcceptFileType::AUDIO;

        return parent::getContent();
    }

  /*  public function onSubmit()
    {

        $this->contentType->file->fromFileRequest($this->file->getFileRequest());
        $this->contentType->saveType();

    }*/
}