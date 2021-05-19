<?php

namespace Nemundo\Com\Template;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\Html\Header\LibraryHeader;
use Nemundo\Html\Document\AbstractHtmlDocument;
use Nemundo\Html\Header\Meta\Meta;

abstract class AbstractTemplateHtmlDocument extends AbstractHtmlDocument
{

    use LibraryTrait;

    public function getContent()
    {

        $library = new LibraryHeader($this);

        $meta = new Meta($this);
        $meta->addAttribute('charset', 'UTF-8');

        $this->html->addAttribute('translate', 'no');
        $this->html->addAttribute('lang', 'de');

        return parent::getContent();

    }

}