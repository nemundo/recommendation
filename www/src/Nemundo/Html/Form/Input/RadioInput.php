<?php

namespace Nemundo\Html\Form\Input;


class RadioInput extends AbstractYesNo
{

    public function getContent()
    {

        $this->addAttribute('type','radio');

        return parent::getContent();
    }

}
