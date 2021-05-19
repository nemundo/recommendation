<?php

namespace Nemundo\Content\App\ContentPrint\Page;

use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Html\Header\Title;
use Nemundo\Package\Bootstrap\Document\BootstrapDocument;

class ContentPrintPage extends BootstrapDocument
{
    public function getContent()
    {

        $parameter = new ContentParameter();
        //$contentId = $parameter->getValue();
        $contentType = (new ContentParameter())->getContent(false);

        $title = new Title($this);
        $title->content = $contentType->getSubject();

        $contentType->getDefaultView($this);

        return parent::getContent();

    }

}