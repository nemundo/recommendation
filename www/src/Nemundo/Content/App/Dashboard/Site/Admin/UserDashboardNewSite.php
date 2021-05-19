<?php


namespace Nemundo\Content\App\Dashboard\Site\Admin;


use Nemundo\Content\App\Dashboard\Page\Admin\DashboardNewPage;
use Nemundo\Content\App\Dashboard\Page\Admin\UserDashboardNewPage;
use Nemundo\Web\Site\AbstractSite;


class UserDashboardNewSite extends AbstractSite
{

    /**
     * @var DashboardNewSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'New';
        $this->url = 'dashboard-new';

        DashboardNewSite::$site = $this;

    }


    public function loadContent()
    {

        (new UserDashboardNewPage())->render();

    }

}