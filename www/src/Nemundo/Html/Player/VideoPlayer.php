<?php

namespace Nemundo\Html\Player;


use Nemundo\Html\Container\AbstractHtmlContainer;


class VideoPlayer extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $src;

    /**
     * @var int
     */
    public $width;

    /**
     * @var int
     */
    public $height;


    public function getContent()
    {

        $this->tagName = 'video';

        $this->addAttribute('width', $this->width);
        $this->addAttribute('height', $this->height);
        $this->addAttributeWithoutValue('controls');

        $source = new Source($this);
        $source->src = $this->src;
        $source->type = 'video/mp4';
        $this->addContent('Your browser does not support the video tag.');

        return parent::getContent();

    }

}