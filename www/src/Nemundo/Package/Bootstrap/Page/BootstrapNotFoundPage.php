<?php

namespace Nemundo\Package\Bootstrap\Page;


use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Document\BootstrapDocument;

class BootstrapNotFoundPage extends BootstrapDocument
{

    public function getContent()
    {

        $p = new Paragraph($this);
        $p->content = '404 - Not found';

        return parent::getContent();
    }

}