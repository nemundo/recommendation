<?php

namespace Nemundo\Content\App\Timeline\Site;

use Nemundo\Content\App\Timeline\Page\TimelinePage;
use Nemundo\Web\Site\AbstractSite;

class TimelineSite extends AbstractSite
{

    /**
     * @var TimelineSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Timeline';
        $this->url = 'timeline';

        TimelineSite::$site=$this;

        new ClearSite($this);

        //new ItemSite($this);

    }

    public function loadContent()
    {
        (new TimelinePage())->render();
    }
}