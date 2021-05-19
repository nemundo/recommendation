<?php


namespace Nemundo\Content\App\Dashboard\Site\Admin;


use Nemundo\Content\App\Dashboard\Page\Admin\DashboardEditPage;
use Nemundo\Content\Index\Tree\Site\ChildDeleteSite;
use Nemundo\Content\Index\Tree\Site\ViewEditSite;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;


class DashboardEditSite extends AbstractEditIconSite
{

    /**
     * @var DashboardEditSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Dashboard Edit';
        $this->url = 'dashboard-edit';
        $this->menuActive = false;

        DashboardEditSite::$site = $this;

        //new ViewEditSite($this);
        //new ChildDeleteSite($this);


        //new DashboardNewSite($this);
        //new ConfigSite($this);

        //new ContentNewSite($this);
        //new ContentEditSite($this);

    }


    public function loadContent()
    {

        (new DashboardEditPage())->render();

    }

}