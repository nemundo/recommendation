<?php

namespace Nemundo\Html\Table;


use Nemundo\Html\Container\AbstractHtmlContainer;

class Thead extends AbstractHtmlContainer
{

    public function getContent()
    {
        $this->tagName = 'thead';
        return parent::getContent();
    }

}
