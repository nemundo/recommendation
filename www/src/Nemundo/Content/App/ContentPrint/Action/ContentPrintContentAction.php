<?php

namespace Nemundo\Content\App\ContentPrint\Action;

use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\App\ContentPrint\Site\ContentPrintSite;

class ContentPrintContentAction extends AbstractContentAction
{

    protected function loadContentType()
    {

        $this->typeLabel = 'Content Print';
        $this->typeId = '2136d408-38a1-4e43-910e-f61841daee1a';
        $this->actionLabel = 'Print';
        $this->viewSite = ContentPrintSite::$site;

    }

}