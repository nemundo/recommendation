<?php


namespace Nemundo\Com\Video\YouTube;


use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;

class YouTubeImage extends BootstrapResponsiveImage
{

    public $youtubeId;

    // $size

    public function getContent()
    {

        //$img = new BootstrapResponsiveImage($this);
        $this->src='https://img.youtube.com/vi/'.$this->youtubeId.'/0.jpg';

        return parent::getContent();
    }

}