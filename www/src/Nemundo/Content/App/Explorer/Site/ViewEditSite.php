<?php

namespace Nemundo\Content\App\Explorer\Site;

use Nemundo\Content\App\Explorer\Page\ViewEditPage;
use Nemundo\Content\App\Explorer\Page\ViewPage;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;
use Nemundo\Web\Site\AbstractSite;

class ViewEditSite extends AbstractEditIconSite
{

    /**
     * @var ViewEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'View Edit';
        $this->url = 'view-edit';
        //$this->menuActive=false;

        ViewEditSite::$site=$this;
    }

    public function loadContent()
    {
        (new ViewEditPage())->render();
    }
}