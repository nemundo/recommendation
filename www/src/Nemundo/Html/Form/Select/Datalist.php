<?php

namespace Nemundo\Html\Form\Select;

use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Container\HtmlContainer;

class Datalist extends AbstractHtmlContainer
{

    protected function loadContainer()
    {
        parent::loadContainer();
        $this->tagName = 'datalist';
    }


    public function addValue($value)
    {

        $container = new HtmlContainer($this);
        $container->tagName = 'option';
        $container->addAttribute('value', $value);
        $container->returnOneLine = true;
        $container->renderClosingTag = false;

        return $this;

    }

}