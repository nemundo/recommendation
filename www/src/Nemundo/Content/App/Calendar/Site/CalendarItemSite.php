<?php

namespace Nemundo\Content\App\Calendar\Site;

use Nemundo\Content\App\Calendar\Page\CalendarItemPage;
use Nemundo\Web\Site\AbstractSite;

class CalendarItemSite extends AbstractSite
{

    /**
     * @var CalendarItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'CalendarItem';
        $this->url = 'calendar-item';
        $this->menuActive = false;

        CalendarItemSite::$site = $this;

    }

    public function loadContent()
    {
        (new CalendarItemPage())->render();
    }
}