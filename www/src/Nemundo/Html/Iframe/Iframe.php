<?php

namespace Nemundo\Html\Iframe;


use Nemundo\Html\Container\AbstractHtmlContainer;

class Iframe extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $src;

    /**
     * @var string
     */
    public $width;

    /**
     * @var string
     */
    public $height;

    /**
     * @var int
     */
    public $frameborder = 0;


    public function getContent()
    {

        $this->tagName = 'iframe';
        $this->addAttribute('src', $this->src);
        $this->addAttribute('width', $this->width);
        $this->addAttribute('height', $this->height);
        $this->addAttribute('frameborder', $this->frameborder);

        return parent::getContent();

    }


    public function addAttributeWithoutValue($attribute)
    {
        parent::addAttributeWithoutValue($attribute);
    }

}