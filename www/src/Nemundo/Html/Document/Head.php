<?php

namespace Nemundo\Html\Document;


use Nemundo\Html\Container\AbstractHtmlContainer;

class Head extends AbstractHtmlContainer
{

    public function getContent()
    {
        $this->tagName = 'head';
        return parent::getContent();
    }


    public function addContent($content)
    {
        return parent::addContent($content);
    }

}