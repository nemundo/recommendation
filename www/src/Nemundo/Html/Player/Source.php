<?php

namespace Nemundo\Html\Player;


use Nemundo\Html\Container\AbstractHtmlContainer;


class Source extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $src;

    /**
     * @var string
     */
    public $type;


    public function getContent()
    {

        $this->tagName='source';

        $this->addAttribute('src',$this->src);
        $this->addAttribute('type',$this->type);

        return parent::getContent();

    }

}