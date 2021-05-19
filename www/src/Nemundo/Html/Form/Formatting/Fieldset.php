<?php

namespace Nemundo\Html\Form\Formatting;


use Nemundo\Html\Container\AbstractHtmlContainer;

class Fieldset extends AbstractHtmlContainer
{

    public function getContent()
    {
        $this->tagName = 'fieldset';
        parent::getContent();
    }

}