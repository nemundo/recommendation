<?php

namespace Nemundo\Content\App\Webcam\Site;

use Nemundo\Content\App\Webcam\Page\WebcamPage;
use Nemundo\Web\Site\AbstractSite;

class WebcamSite extends AbstractSite
{

    /**
     * @var WebcamSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Webcam';
        $this->url = 'webcam';
        WebcamSite::$site= $this;

        new WebcamItemSite($this);

        new WebcamAdminSite($this);

    }

    public function loadContent()
    {
        (new WebcamPage())->render();
    }
}