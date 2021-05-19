<?php

namespace Nemundo\Html\Form\Input;


// Checkbox
class CheckBoxInput extends AbstractYesNo
{

    public function getContent()
    {

        $this->addAttribute('type','checkbox');

        return parent::getContent();
    }

}
