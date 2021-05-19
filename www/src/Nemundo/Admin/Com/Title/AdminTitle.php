<?php

namespace Nemundo\Admin\Com\Title;


use Nemundo\Html\Container\AbstractContentContainer;

class AdminTitle extends AbstractContentContainer
{

    public function getContent()
    {
        $this->tagName = 'h2';
        return parent::getContent();
    }

}