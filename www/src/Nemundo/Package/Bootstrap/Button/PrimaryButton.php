<?php

namespace Nemundo\Package\Bootstrap\Button;


use Nemundo\Html\Button\Button;

class PrimaryButton extends Button
{

    public function getContent()
    {
        $this->addCssClass('btn btn-primary');
        return parent::getContent();
    }

}