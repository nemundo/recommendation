<?php

namespace Nemundo\Html\Listing;


use Nemundo\Html\Container\AbstractContentContainer;


class Li extends AbstractContentContainer
{

    public function getContent()
    {

        $this->tagName = 'li';
        $this->returnOneLine = true;

        return parent::getContent();

    }

}