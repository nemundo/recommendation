<?php

namespace Nemundo\Html\Inline;


use Nemundo\Html\Container\AbstractContentContainer;

class Span extends AbstractContentContainer
{

    protected function loadContainer()
    {
        $this->tagName = 'span';
    }

}
