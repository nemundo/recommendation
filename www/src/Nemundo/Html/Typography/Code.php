<?php

namespace Nemundo\Html\Typography;


use Nemundo\Html\Container\AbstractContentContainer;

class Code extends AbstractContentContainer
{

    protected function loadContainer()
    {
        $this->tagName = 'code';
    }

}
