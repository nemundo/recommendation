<?php

namespace Nemundo\Content\App\Timeline\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Parameter\ContentParameter;

class ItemPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $contentType=(new ContentParameter())->getContent(false);
        $contentType->getDefaultView($this);


        return parent::getContent();
    }
}