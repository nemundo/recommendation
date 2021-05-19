<?php

namespace Nemundo\Html\Heading;


use Nemundo\Html\Container\AbstractContentContainer;

class H4 extends AbstractContentContainer
{

    public function getContent()
    {
        $this->tagName = 'h4';
        return parent::getContent();
    }

}
