<?php

namespace Nemundo\Com\Svg;


use Nemundo\Html\Container\AbstractHtmlContainer;

class Line extends AbstractHtmlContainer
{

    /**
     * @var int
     */
    public $x1;

    /**
     * @var int
     */
    public $y1;

    /**
     * @var int
     */
    public $x2;

    /**
     * @var int
     */
    public $y2;

    /**
     * @var Color
     */
    public $color = Color::BLACK;

    /**
     * @var int
     */
    public $width = 1;


    public function getContent()
    {

        $this->tagName = 'line';
        $this->addAttribute('x1', $this->x1);
        $this->addAttribute('y1', $this->y1);
        $this->addAttribute('x2', $this->x2);
        $this->addAttribute('y2', $this->y2);
        $this->addAttribute('stroke-width', $this->width);
        $this->addAttribute('stroke', $this->color);


        return parent::getContent();
    }


//<line x1="0" y1="0" x2="200" y2="200" style="stroke:rgb(255,0,0);stroke-width:2" />


}