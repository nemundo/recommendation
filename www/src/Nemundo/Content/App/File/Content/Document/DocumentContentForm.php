<?php

namespace Nemundo\Content\App\File\Content\Document;

use Nemundo\Content\App\File\Content\File\AbstractFileContentForm;
use Nemundo\Html\Form\Input\AcceptFileType;

class DocumentContentForm extends AbstractFileContentForm
{
    /**
     * @var DocumentContentType
     */
    public $contentType;

    public function getContent()
    {
        //$this->file->acceptFileType ='.pdf,.txt';  // AcceptFileType::PDF;
        return parent::getContent();
    }

}