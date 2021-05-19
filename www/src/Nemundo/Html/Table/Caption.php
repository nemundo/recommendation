<?php

namespace Nemundo\Html\Table;


use Nemundo\Html\Container\AbstractHtmlContainer;

class Caption extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $caption;

    public function getContent()
    {
        $this->tagName = 'caption';
        $this->returnOneLine = true;
        $this->addContent($this->caption);
        return parent::getContent();
    }

}