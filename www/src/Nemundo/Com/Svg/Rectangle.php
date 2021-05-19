<?php

namespace Nemundo\Com\Svg;


use Nemundo\Html\Container\AbstractHtmlContainer;

class Rectangle extends AbstractHtmlContainer
{

    /**
     * @var int
     */
    public $x;

    /**
     * @var int
     */
    public $y;

    /**
     * @var int
     */
    public $width;

    /**
     * @var int
     */
    public $height;

    /**
     * @var Color
     */
    public $color;

    /**
     * @var int
     */
    public $borderWidth;

    /**
     * @var Color
     */
    public $borderColor;


//<rect width="300" height="100" style="fill:rgb(0,0,255);stroke-width:3;stroke:rgb(0,0,0)" />

// stroke="black" stroke-width="3"

    public function getContent()
    {

        $this->tagName = 'rect';
        $this->addAttribute('x', $this->x);
        $this->addAttribute('y', $this->y);
        $this->addAttribute('width', $this->width);
        $this->addAttribute('height', $this->height);
        $this->addAttribute('fill', $this->color);
        $this->addAttribute('stroke-width', $this->borderWidth);
        $this->addAttribute('stroke', $this->borderColor);

        return parent::getContent();
    }

}