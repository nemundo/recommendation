<?php

namespace Nemundo\Com\Svg;


use Nemundo\Html\Container\AbstractContentContainer;


class SvgText extends AbstractContentContainer
{

    /**
     * @var int
     */
    public $x;

    /**
     * @var int
     */
    public $y;

    public $color = Color::BLACK;


    //<text x="0" y="15" fill="red">I love SVG!</text>

    public function getContent()
    {
        $this->tagName = 'text';
        $this->addAttribute('x', $this->x);
        $this->addAttribute('y', $this->y);
        $this->addAttribute('fill', $this->color);
        return parent::getContent();
    }


}