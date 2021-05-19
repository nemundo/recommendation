<?php


namespace Nemundo\Content\App\Dashboard\Site\Admin;


use Nemundo\Content\App\Dashboard\Page\Admin\DashboardAdminPage;
use Nemundo\Content\App\Dashboard\Page\Admin\DashboardEditPage;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;
use Nemundo\Web\Site\AbstractSite;


class DashboardAdminSite extends AbstractSite
{

    /**
     * @var DashboardAdminSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Dashboard';
        $this->url = 'dashboard-admin';

        DashboardAdminSite::$site = $this;

        new DashboardNewSite($this);
        new DashboardEditSite($this);
        new DashboardDeleteSite($this);
        new ConfigSite($this);

        //new ContentNewSite($this);
        //new ContentEditSite($this);

    }


    public function loadContent()
    {

        (new DashboardAdminPage())->render();

    }

}