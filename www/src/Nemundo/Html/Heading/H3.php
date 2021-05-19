<?php

namespace Nemundo\Html\Heading;


use Nemundo\Html\Container\AbstractContentContainer;

class H3 extends AbstractContentContainer
{

    public function getContent()
    {
        $this->tagName = 'h3';
        return parent::getContent();
    }

}
