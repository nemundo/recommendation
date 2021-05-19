<?php

namespace Nemundo\Package\FontAwesome;


use Nemundo\Html\Container\AbstractHtmlContainer;

abstract class AbstractFontAwesomeIcon extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    protected $icon;


    /**
     * Grösse zwischen 1 und 5
     * @var int
     */
    public $iconSize;

    /**
     * Farb Hex Code
     * @var string
     */
    public $color;

    /**
     * @var bool
     */
    public $solid = false;

    public function getContent()
    {

        $this->checkProperty('icon');

        $size = '';
        if ($this->iconSize !== null) {
            $size = ' fa-' . $this->iconSize . 'x';
        }

        $color = '';
        if ($this->color !== null) {
            $color = ' style="color:#7c06b7"';
        }

        $this->tagName = 'i';
        $this->returnOneLine = true;

        if ($this->solid) {
            $this->addCssClass('far');
        } else {
            $this->addCssClass('fas');
        }

        $this->addCssClass('fa-' . $this->icon . $size);

        return parent::getContent();

    }

}