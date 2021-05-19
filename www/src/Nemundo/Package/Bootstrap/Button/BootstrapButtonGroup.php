<?php

namespace Nemundo\Package\Bootstrap\Button;


use Nemundo\Html\Container\AbstractHtmlContainer;

class BootstrapButtonGroup extends AbstractHtmlContainer
{

    protected function loadContainer()
    {
        parent::loadContainer();
        $this->tagName = 'div';
        $this->addCssClass('btn-group');

        $this->addAttribute('role', 'group');
    }

}