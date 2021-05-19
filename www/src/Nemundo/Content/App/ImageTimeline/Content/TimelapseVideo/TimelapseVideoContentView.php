<?php

namespace Nemundo\Content\App\ImageTimeline\Content\TimelapseVideo;

use Nemundo\Admin\Com\Player\AdminVideoPlayer;
use Nemundo\Content\View\AbstractContentView;

class TimelapseVideoContentView extends AbstractContentView
{

    /**
     * @var TimelapseVideoContentType
     */
    public $contentType;

    protected function loadView()
    {
        $this->viewName = 'default';
        $this->viewId = '7828f6dd-ebe9-4f36-920a-2fca311170b2';
        $this->defaultView = true;
    }

    public function getContent()
    {

        $video = new AdminVideoPlayer($this);
        //$video->addCssClass('mw-100');
        $video->src = $this->contentType->getDataRow()->video->getUrl();


        return parent::getContent();
    }
}