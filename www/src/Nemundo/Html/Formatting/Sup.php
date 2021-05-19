<?php

namespace Nemundo\Html\Formatting;

use Nemundo\Html\Container\AbstractContentContainer;


class Sup extends AbstractContentContainer
{

    protected function loadContainer()
    {
        $this->tagName = 'sup';
    }

}