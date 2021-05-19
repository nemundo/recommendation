<?php

namespace Nemundo\Com\Template;

use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Html\Document\AbstractDocument;

class AbstractTemplateDocument extends AbstractDocument
{

    //public $pageTitle;

    public function render()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();
        //$page->title = $this->pageTitle;
        $page->addContainer($this);
        $page->render();

    }

}