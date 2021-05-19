<?php

namespace Nemundo\Html\Heading;


use Nemundo\Html\Container\AbstractContentContainer;

class H2 extends AbstractContentContainer
{

    public function getContent()
    {
        $this->tagName = 'h2';
        return parent::getContent();
    }

}
