<?php

namespace Nemundo\Html\Typography;


use Nemundo\Html\Container\AbstractContentContainer;

class Blockquote extends AbstractContentContainer
{

    protected function loadContainer()
    {

        $this->tagName = 'blockquote';

    }

}