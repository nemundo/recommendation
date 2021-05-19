<?php

namespace Nemundo\Admin\Com\Form\Input;


use Nemundo\Html\Form\Input\SubmitInput;

class AdminSubmitInput extends SubmitInput
{

    public function getContent()
    {

        $this->addCssClass('btn btn-primary');
        return parent::getContent();

    }

}