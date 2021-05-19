<?php

namespace Nemundo\Com\Video\YouTube;


use Nemundo\Com\Video\AbstractVideoPlayer;
use Nemundo\Core\Http\Url\UrlBuilder;
use Nemundo\Core\Http\Url\UrlInformation;
use Nemundo\Html\Iframe\Iframe;


// https://developers.google.com/youtube/iframe_api_reference

// Package

class YouTubePlayer extends AbstractVideoPlayer
{

    public function getContent()
    {

        $this->checkProperty('videoId');

        $url = 'https://www.youtube.com/embed/' . $this->videoId;

        /*
        $url = new UrlBuilder('https://www.youtube.com/embed/' . $this->videoId . '?');
        $url->addRequestValue('showinfo', '0');
        $url->addRequestValue('controls', '0');
        $url->addRequestValue('rel', '0');*/

        $iframe = new Iframe($this);
        $iframe->width = $this->width;
        $iframe->height = $this->height;
        $iframe->src = $url;  //->getUrl();
        //$iframe->width='100%';
        //$iframe->height='100%';

        //$iframe->addCssClass('embed-responsive-item');


        $iframe->addAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
        $iframe->addAttributeWithoutValue('allowfullscreen');
        //$iframe->addAttribute('allowfullscreen','allowfullscreen');

        //<iframe width="560" height="315" src="https://www.youtube.com/embed/_K3sYF-kh-Y" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        // allowfullscreen="allowfullscreen"


        return parent::getContent();

    }

}