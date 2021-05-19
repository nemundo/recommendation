<?php

namespace Nemundo\Html\Listing;


use Nemundo\Html\Container\AbstractHtmlContainer;


abstract class AbstractLi extends AbstractHtmlContainer
{


    public function getContent()
    {
        $this->tagName = 'li';
        return parent::getContent();
    }

}