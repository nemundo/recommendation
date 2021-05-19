<?php

namespace Nemundo\Html\Table;


use Nemundo\Html\Container\AbstractHtmlContainer;

class Tbody extends AbstractHtmlContainer
{

    public function getContent()
    {
        $this->tagName = 'tbody';
        return parent::getContent();
    }

}