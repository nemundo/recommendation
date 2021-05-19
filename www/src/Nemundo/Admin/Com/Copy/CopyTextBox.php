<?php

namespace Nemundo\Admin\Com\Copy;


use Nemundo\Admin\Com\Button\AdminCopyButton;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;


class CopyTextBox extends BootstrapTextBox
{

    public function getContent()
    {

        $btn = new AdminCopyButton();
        $btn->copyId = $this->name;

        $this->addContainer($btn);

        return parent::getContent();

    }

}