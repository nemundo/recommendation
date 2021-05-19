<?php

namespace Nemundo\Html\Heading;


use Nemundo\Html\Container\AbstractContentContainer;

class H6 extends AbstractContentContainer
{

    public function getContent()
    {
        $this->tagName = 'h6';
        return parent::getContent();
    }

}
