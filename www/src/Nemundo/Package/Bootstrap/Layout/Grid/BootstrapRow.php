<?php

namespace Nemundo\Package\Bootstrap\Layout\Grid;


use Nemundo\Html\Container\AbstractHtmlContainer;

class BootstrapRow extends AbstractHtmlContainer
{

    public function getContent()
    {

        $this->tagName = 'div';
        $this->addCssClass('row');

        return parent::getContent();

    }

}
