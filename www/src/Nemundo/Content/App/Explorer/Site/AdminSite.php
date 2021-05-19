<?php

namespace Nemundo\Content\App\Explorer\Site;

use Nemundo\Content\App\Explorer\Page\AdminPage;
use Nemundo\Web\Site\AbstractSite;

class AdminSite extends AbstractSite
{

    /**
     * @var AdminSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Admin';
        $this->url = 'admin';
        AdminSite::$site = $this;
    }

    public function loadContent()
    {
        (new AdminPage())->render();
    }
}