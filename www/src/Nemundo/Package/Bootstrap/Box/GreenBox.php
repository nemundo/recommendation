<?php

namespace Nemundo\Package\Bootstrap\Box;


class GreenBox extends AbstractBox
{

    public function getContent()
    {
        $this->addCssClass('alert-success');
        $this->addAttribute('role', 'alert');
        return parent::getContent();
    }

}