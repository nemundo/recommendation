<?php

namespace Nemundo\Html\Header;


use Nemundo\Html\Container\AbstractHtmlContainer;

class Style extends AbstractHtmlContainer
{


    public function addStyle($style)
    {
        $this->addContent($style);
        return $this;
    }

    public function getContent()
    {

        $this->tagName = 'style';
        return parent::getContent();

    }

}