<?php

namespace Nemundo\Content\App\ImageTimeline\Site;

use Nemundo\Content\App\ImageTimeline\Page\ImageTimelinePage;
use Nemundo\Web\Site\AbstractSite;

class ImageTimelineSite extends AbstractSite
{

    /**
     * @var ImageTimelineSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Image Timeline';
        $this->url = 'image-timeline';

        ImageTimelineSite::$site=$this;

        new TimelapseSite($this);

        new ZipDownloadSite($this);

    }

    public function loadContent()
    {
        (new ImageTimelinePage())->render();
    }
}