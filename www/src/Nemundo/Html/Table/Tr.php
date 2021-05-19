<?php

namespace Nemundo\Html\Table;

use Nemundo\Html\Container\AbstractHtmlContainer;


class Tr extends AbstractHtmlContainer
{

    /**
     * @var bool
     */
    public $nowrap = false;


    public function getContent()
    {
        $this->tagName = 'tr';
        return parent::getContent();
    }

}
