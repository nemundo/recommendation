<?php

namespace Nemundo\Content\App\Webcam\Site;

use Nemundo\Content\App\Webcam\Page\WebcamItemPage;
use Nemundo\Web\Site\AbstractSite;

class WebcamItemSite extends AbstractSite
{

    /**
     * @var WebcamItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'WebcamItem';
        $this->url = 'item';
        $this->menuActive=false;
        WebcamItemSite::$site=$this;
    }

    public function loadContent()
    {
        (new WebcamItemPage())->render();
    }
}