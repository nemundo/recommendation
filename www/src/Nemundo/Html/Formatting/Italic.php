<?php

namespace Nemundo\Html\Formatting;

use Nemundo\Html\Container\AbstractContentContainer;


class Italic extends AbstractContentContainer
{

    protected function loadContainer()
    {
        $this->tagName = 'i';
    }

}