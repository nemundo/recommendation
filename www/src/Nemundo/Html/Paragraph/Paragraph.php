<?php

namespace Nemundo\Html\Paragraph;

use Nemundo\Html\Container\AbstractContentContainer;

class Paragraph extends AbstractContentContainer
{

    public function getContent()
    {
        $this->tagName = 'p';
        return parent::getContent();
    }

}
