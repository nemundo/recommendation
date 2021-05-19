<?php

namespace Nemundo\Admin\Com\Copy;


use Nemundo\Admin\Com\Button\AdminCopyButton;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;


class CopyLargeTextBox extends BootstrapLargeTextBox
{

    public function getContent()
    {

        $btn = new AdminCopyButton();
        $btn->copyId = $this->name;

        $this->addContainer($btn);

        return parent::getContent();

    }

}