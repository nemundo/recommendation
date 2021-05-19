<?php

namespace Nemundo\Content\App\File\Content\WebFile;

use Nemundo\Content\App\File\Content\File\AbstractFileContentForm;

class WebFileContentForm extends AbstractFileContentForm
{
    /**
     * @var WebFileContentType
     */
    public $contentType;

    public function getContent()
    {
        return parent::getContent();
    }

    public function onSubmit()
    {
        $this->contentType->saveType();
    }
}