<?php


namespace Nemundo\App\Application\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\App\Application\Site\ApplicationSite;
use Nemundo\App\Application\Site\DataSite;
use Nemundo\App\Application\Site\ProjectSite;
use Nemundo\App\Application\Site\SystemLogSite;
use Nemundo\App\Scheduler\Site\SchedulerSite;
use Nemundo\Com\Template\AbstractTemplateDocument;

class ApplicationTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);
        //$nav->site =ApplicationSite::$site;

        $site = clone(ApplicationSite::$site);
        $site->addParameter(new ApplicationParameter());
        $nav->addSite($site);

        $site = clone(DataSite::$site);
        $site->addParameter(new ApplicationParameter());
        $nav->addSite($site);

        $site = clone(SystemLogSite::$site);
        $site->addParameter(new ApplicationParameter());
        $nav->addSite($site);

        $site = clone(ProjectSite::$site);
        $nav->addSite($site);


    }

}