<?php


namespace Nemundo\Content\App\Calendar\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Calendar\Site\CalendarSite;

class CalendarTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav=new AdminNavigation($this);
        $nav->site= CalendarSite::$site;

    }

}