<?php

namespace Nemundo\Html\Heading;


use Nemundo\Html\Container\AbstractContentContainer;


class H1 extends AbstractContentContainer
{

    public function getContent()
    {
        $this->tagName = 'h1';
        return parent::getContent();
    }

}
