<?php

namespace Nemundo\Content\App\File\Content\Video;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Player\VideoPlayer;

class VideoContentView extends AbstractContentView
{
    /**
     * @var VideoContentType
     */
    public $contentType;


    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='ecf82d1b-bbbf-44ba-805d-a4ca28caeaed';
        $this->defaultView=true;

    }


    public function getContent()
    {

        /*
        video {
        width: 100%;
        max-height: 100%;
}*/


        $fileRow = $this->contentType->getDataRow();

        $video = new VideoPlayer($this);
        //$video->addCssClass('embed-responsive-item m-w100');
        $video->addCssClass('mw-100');
        $video->src = $fileRow->video->getUrl();
        //$video->width = 800;

        return parent::getContent();
    }
}