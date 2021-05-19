<?php

namespace Nemundo\Content\App\ImageTimeline\Site;

use Nemundo\Content\App\ImageTimeline\Page\TimelapsePage;
use Nemundo\Web\Site\AbstractSite;

class TimelapseSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Timelapse';
        $this->url = 'Timelapse';
    }

    public function loadContent()
    {
        (new TimelapsePage())->render();
    }
}