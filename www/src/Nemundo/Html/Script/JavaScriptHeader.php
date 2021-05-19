<?php

namespace Nemundo\Html\Script;


use Nemundo\Html\Container\AbstractHtmlContainer;



class JavaScriptHeader extends AbstractHtmlContainer
{

    public $src;


    public function getContent()
    {

        $this->tagName = 'script';
        $this->returnOneLine = true;
        $this->addAttribute('src', $this->src);

        return parent::getContent();
    }

}