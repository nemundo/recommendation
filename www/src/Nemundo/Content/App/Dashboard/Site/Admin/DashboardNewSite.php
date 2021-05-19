<?php


namespace Nemundo\Content\App\Dashboard\Site\Admin;


use Nemundo\Content\App\Dashboard\Page\Admin\DashboardNewPage;
use Nemundo\Web\Site\AbstractSite;


class DashboardNewSite extends AbstractSite
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

        (new DashboardNewPage())->render();

    }

}