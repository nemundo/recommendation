<?php

namespace Nemundo\Html\Block;


use Nemundo\Html\Container\AbstractHtmlContainer;


class Br extends AbstractHtmlContainer
{
    public function getContent()
    {
        $this->tagName = 'br';
        $this->returnOneLine = true;
        $this->renderClosingTag = false;
        return parent::getContent();
    }

}
