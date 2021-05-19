<?php

namespace Nemundo\Html\Formatting;

use Nemundo\Html\Container\AbstractContentContainer;

class Bold extends AbstractContentContainer
{

    public function getContent()
    {
        $this->tagName = 'b';
        return parent::getContent();
    }


}
