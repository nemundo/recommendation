<?php

namespace Nemundo\Admin\Page;


use Nemundo\Com\Html\Header\LibraryHeader;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Html\Document\HtmlDocument;
use Nemundo\Package\Bootstrap\Document\BootstrapDocument;


class NotFoundPage extends BootstrapDocument
{

    public function getContent()
    {

        LibraryHeader::$documentTitle = '404 - Page not found';

        $p = new Paragraph($this);
        $p->content = '404 - Page not found';

        return parent::getContent();
    }

}