<?php

namespace Nemundo\Com\Svg;


use Nemundo\Html\Container\AbstractHtmlContainer;

class Circle extends AbstractHtmlContainer
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
    public $radius;

    /**
     * @var Color
     */
    public $color;

    public function getContent()
    {

        $this->tagName = 'circle';


        $this->addAttribute('cx', $this->x);
        $this->addAttribute('cy', $this->y);
        $this->addAttribute('r', $this->radius);
        $this->addAttribute('fill', $this->color);


        //<circle cx="50" cy="50" r="40" stroke="green" stroke-width="4" fill="yellow" />

        return parent::getContent();
    }


}