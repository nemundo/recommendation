<?php

namespace Nemundo\Package\Bootstrap\Document;

use Nemundo\Com\Template\AbstractTemplateHtmlDocument;
use Nemundo\Com\Template\TemplateHtmlDocument;
use Nemundo\Html\Header\Meta\Meta;
use Nemundo\Package\Bootstrap\Package\BootstrapPackage;
use Nemundo\Package\Jquery\Package\JqueryPackage;

class BootstrapDocument extends AbstractTemplateHtmlDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $this->addPackage(new JqueryPackage());
        $this->addPackage(new BootstrapPackage());

    }


    public function getContent()
    {

        $meta = new Meta($this);
        $meta->addAttribute('name', 'viewport');
        $meta->addAttribute('content', 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no');

        return parent::getContent();

    }

}