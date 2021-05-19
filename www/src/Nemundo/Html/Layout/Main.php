<?php

namespace Nemundo\Html\Layout;


use Nemundo\Html\Container\AbstractHtmlContainer;


class Main extends AbstractHtmlContainer
{

    public function getContent()
    {
        $this->tagName = 'main';
        return parent::getContent();
    }

}