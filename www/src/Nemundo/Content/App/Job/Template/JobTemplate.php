<?php


namespace Nemundo\Content\App\Job\Template;


use Nemundo\Admin\Com\Navbar\AdminSiteNavbar;
use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\ImageTimeline\Site\ImageTimelineSite;
use Nemundo\Content\App\Job\Site\JobSite;

class JobTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {
        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site= JobSite::$site;

    }

}