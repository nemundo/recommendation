<?php

namespace Nemundo\Html\Document;


use Nemundo\Html\Container\AbstractHtmlContainer;

class Html extends AbstractHtmlContainer
{

    public function getContent()
    {

        $this->tagName = 'html';
        $this->addAttribute('translate', 'no');

        return parent::getContent();

    }


    public function addAttribute($attribute, $value)
    {
        parent::addAttribute($attribute, $value);
    }

}