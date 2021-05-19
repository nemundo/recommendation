<?php

namespace Nemundo\Html\Form\Formatting;


use Nemundo\Html\Container\AbstractContentContainer;

class Legend extends AbstractContentContainer
{

    public function getContent()
    {
        $this->tagName = 'legend';
        return parent::getContent();
    }

}