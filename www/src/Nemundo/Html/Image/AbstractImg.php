<?php

namespace Nemundo\Html\Image;

use Nemundo\Html\Container\AbstractHtmlContainer;


abstract class AbstractImg extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    protected $src;

    /**
     * @var int
     */
    protected $width;

    /**
     * @var int
     */
    protected $height;

    /**
     * @var string
     */
    protected $alt;

    public function getContent()
    {

        $this->tagName = 'img';
        $this->renderClosingTag = false;

        $this->addAttribute('width', $this->width);
        $this->addAttribute('height', $this->height);
        $this->addAttribute('src', $this->src);
        $this->addAttribute('alt', $this->alt);

        return parent::getContent();

    }

}
