<?php

namespace Nemundo\Html\Form\Input;


class ColorInput extends AbstractInput
{

    public function getContent()
    {

        $this->addAttribute('type', 'color');
        return parent::getContent();

    }

}