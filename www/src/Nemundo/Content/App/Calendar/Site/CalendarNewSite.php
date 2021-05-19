<?php

namespace Nemundo\Content\App\Calendar\Site;

use Nemundo\Content\App\Calendar\Page\CalendarNewPage;
use Nemundo\Web\Site\AbstractSite;

class CalendarNewSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'New';
        $this->url = 'new';
    }

    public function loadContent()
    {
        (new CalendarNewPage())->render();
    }
}