<?php

namespace Nemundo\Content\App\FileTransfer\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\FileTransfer\Content\FileTransfer\FileTransferContentType;

class FileTransferPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        (new FileTransferContentType())->getDefaultForm($this);





        return parent::getContent();
    }
}