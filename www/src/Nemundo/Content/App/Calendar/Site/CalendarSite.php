<?php

namespace Nemundo\Content\App\Calendar\Site;

use Nemundo\Content\App\Calendar\Page\CalendarPage;
use Nemundo\Web\Site\AbstractSite;

class CalendarSite extends AbstractSite
{

    /**
     * @var CalendarSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Calendar';
        $this->url = 'calendar';

        CalendarSite::$site = $this;

        new CalendarNewSite($this);
        new ConfigSite($this);

        new VCalendarIconSite($this);

    }

    public function loadContent()
    {
        (new CalendarPage())->render();
    }
}