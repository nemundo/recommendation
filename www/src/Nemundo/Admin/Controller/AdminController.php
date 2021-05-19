<?php

namespace Nemundo\Admin\Controller;


use Nemundo\Admin\Site\AdminHomeSite;
use Nemundo\Admin\Site\ConfigSite;
use Nemundo\App\Application\Site\AdminSite;
use Nemundo\App\Application\Site\AppSite;
use Nemundo\App\ClassDesigner\Site\ClassDesignerSite;
use Nemundo\App\Git\Site\GitSite;
use Nemundo\App\ModelDesigner\Site\ModelDesignerSite;
use Nemundo\App\UserAction\Site\UserActionSite;
use Nemundo\Content\App\Calendar\Site\CalendarSite;
use Nemundo\Web\Controller\AbstractWebController;
use Nemundo\Web\Site\AbstractSite;


class AdminController extends AbstractWebController
{

    /**
     * @var AbstractSite[]
     */
    private static $adminSiteList = [];


    // addAdminSiteClass
    public static function addAdminSite(AbstractSite $site)
    {
        AdminController::$adminSiteList[] = $site;
    }


    protected function loadController()
    {

        new AdminHomeSite($this);


        //new CalendarSite($this);

        //(new \Nemundo\Admin\Controller\AdminController())->addSite(new \Nemundo\Content\App\Calendar\Site\CalendarSite());

        $site = new AppSite($this);
        $site->restricted = false;

        $site = new AdminSite($this);
        $site->restricted = false;

        new UserActionSite($this);

        new ModelDesignerSite($this);
        new ClassDesignerSite($this);

        new ConfigSite($this);

        foreach (AdminController::$adminSiteList as $site) {
            $this->addSite($site);
        }

    }

}