<?php

namespace Nemundo\Com\Svg;


use Nemundo\Html\Container\AbstractHtmlContainer;

class Svg extends AbstractHtmlContainer
{

    /**
     * @var int
     */
    public $width = 500;

    /**
     * @var int
     */
    public $height = 500;


    public function getContent()
    {

        $this->tagName = 'svg';

        $this->addAttribute('width', $this->width);
        $this->addAttribute('height', $this->height);


        return parent::getContent();
    }


}