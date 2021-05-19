<?php

namespace Nemundo\Html\Layout;


use Nemundo\Html\Container\AbstractHtmlContainer;


class Footer extends AbstractHtmlContainer
{

    public function getContent()
    {
        $this->tagName = 'footer';
        return parent::getContent();
    }

}