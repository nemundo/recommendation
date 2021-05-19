<?php


namespace Nemundo\Html\Form\Input;


class TimeInput extends AbstractInput
{

    public function getContent()
    {

        $this->addAttribute('type', 'time');
        return parent::getContent();

    }

}