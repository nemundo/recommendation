<?php

namespace Nemundo\Html\Formatting;

use Nemundo\Html\Container\AbstractContentContainer;

class Strike extends AbstractContentContainer
{

    public function getContent()
    {
        $this->tagName = 'strike';
        return parent::getContent();
    }

}
