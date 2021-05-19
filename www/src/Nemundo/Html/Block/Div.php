<?php

namespace Nemundo\Html\Block;

use Nemundo\Html\Container\AbstractHtmlContainer;

class Div extends AbstractHtmlContainer
{

    public function getContent()
    {
        $this->tagName = 'div';
        return parent::getContent();
    }

}
