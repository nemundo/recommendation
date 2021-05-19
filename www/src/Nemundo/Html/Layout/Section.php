<?php

namespace Nemundo\Html\Layout;


use Nemundo\Html\Container\AbstractHtmlContainer;

class Section extends AbstractHtmlContainer
{

    public function getContent()
    {
        $this->tagName = 'section';
        return parent::getContent();
    }

}