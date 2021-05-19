<?php

namespace Nemundo\Content\App\File\Page;

use Nemundo\Content\App\File\Com\Form\FileContentDropzoneUploadForm;
use Nemundo\Content\App\File\Template\FileTemplate;

class UploadPage extends FileTemplate
{
    public function getContent()
    {

        new FileContentDropzoneUploadForm($this);
        return parent::getContent();

    }
}