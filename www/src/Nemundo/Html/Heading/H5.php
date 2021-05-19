<?php

namespace Nemundo\Html\Heading;

use Nemundo\Html\Container\AbstractContentContainer;

class H5 extends AbstractContentContainer
{

    public function getContent()
    {
        $this->tagName = 'h5';
        return parent::getContent();
    }

}
