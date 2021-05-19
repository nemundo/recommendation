<?php

namespace Nemundo\Html\Layout;


use Nemundo\Html\Container\AbstractHtmlContainer;


class Header extends AbstractHtmlContainer
{

    public function getContent()
    {
        $this->tagName = 'header';
        return parent::getContent();
    }

}