<?php

namespace Nemundo\Com\Video;


use Nemundo\Html\Container\AbstractHtmlContainer;

abstract class AbstractVideoPlayer extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $videoId;

    /**
     * @var bool
     */
    public $autoPlay = false;
    // autoplay

    /**
     * @var int
     */
    public $width;  // = 600;

    /**
     * @var int
     */
    public $height;  // = 360;


}