<?php

namespace Nemundo\Admin\Com\Button;


use Nemundo\Package\Bootstrap\Button\BootstrapButtonSize;
use Nemundo\Package\Bootstrap\Button\BootstrapUrlButton;

class AdminUrlButton extends BootstrapUrlButton
{

    public function getContent()
    {
        $this->size = BootstrapButtonSize::SMALL;
        return parent::getContent();
    }

}