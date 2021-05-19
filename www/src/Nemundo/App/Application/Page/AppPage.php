<?php

namespace Nemundo\App\Application\Page;


use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Com\Html\Header\LibraryHeader;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Web\ResponseConfig;

class AppPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $p = new Paragraph($this);
        $p->content = 'No App available';

        LibraryHeader::$documentTitle = 'No App available';

        //ResponseConfig::$title= 'No App available';

        return parent::getContent();

    }

}