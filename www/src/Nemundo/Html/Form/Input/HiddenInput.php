<?php

namespace Nemundo\Html\Form\Input;


class HiddenInput extends AbstractInput
{

    public function getContent()
    {

        $this->addAttribute('type', 'hidden');

        return parent::getContent();

    }

}
