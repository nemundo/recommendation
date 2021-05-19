<?php

namespace Nemundo\Package\Bootstrap\Icon;


use Nemundo\Html\Container\AbstractHtmlContainer;

class BootstrapIcon extends AbstractHtmlContainer
{

    public $icon;

    public function getContent()
    {

        $this->tagName = 'i';
        $this->returnOneLine = true;
        $this->addCssClass('bi');
        $this->addCssClass('bi-' . $this->icon);

        return parent::getContent();

    }

}