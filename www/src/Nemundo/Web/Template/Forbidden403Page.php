<?php

namespace Nemundo\Web\Template;


use Nemundo\Html\Document\HtmlDocument;
use Nemundo\Com\Html\Header\LibraryHeader;
use Nemundo\Html\Paragraph\Paragraph;


class Forbidden403Page extends HtmlDocument
{

    public function getContent()
    {

        LibraryHeader::$documentTitle = '403 - Kein Zugriff';

        $p = new Paragraph($this);
        $p->content = '403 - Kein Zugriff';

        return parent::getContent();

    }

}