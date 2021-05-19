<?php

namespace Nemundo\Html\Form\Input;


class SubmitInput extends AbstractInput
{

    public function getContent()
    {

        $this->addAttribute('type', 'submit');
        return parent::getContent();

    }

}
