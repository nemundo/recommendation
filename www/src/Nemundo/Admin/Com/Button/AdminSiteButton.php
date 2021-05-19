<?php

namespace Nemundo\Admin\Com\Button;


use Nemundo\Package\Bootstrap\Button\BootstrapButtonSize;
use Nemundo\Package\Bootstrap\Button\BootstrapSiteButton;

class AdminSiteButton extends BootstrapSiteButton
{

    public function getContent()
    {
        $this->size = BootstrapButtonSize::SMALL;
        return parent::getContent();
    }

}