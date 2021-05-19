<?php

namespace Nemundo\Com\Video\Vimeo;


use Nemundo\Html\Iframe\Iframe;
use Nemundo\Com\Video\AbstractVideoPlayer;

class VimeoPlayer extends AbstractVideoPlayer
{

    public function getContent()
    {


        //<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/502838130?portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
        //<iframe src="https://player.vimeo.com/video/31243487" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

        $url = 'https://player.vimeo.com/video/' . $this->videoId;

        //  $url->addParameterValue('autoplay', '1');
        //  $url->addParameterValue('showinfo', '0');


        $this->addContent('<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="'.$url.'?portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>');

        /*
        $iframe = new Iframe($this);
        $iframe->width = $this->width;
        $iframe->height = $this->height;
        $iframe->src = $url;
*/

        return parent::getContent();

    }

}