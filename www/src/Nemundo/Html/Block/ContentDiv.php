<?php

namespace Nemundo\Html\Block;


use Nemundo\Html\Container\AbstractContentContainer;

class ContentDiv extends AbstractContentContainer
{

    public function getContent()
    {

        $this->tagName = 'div';
        $this->returnOneLine = true;
        return parent::getContent();

    }

}
