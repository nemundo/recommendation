<?php

namespace Nemundo\Content\App\Explorer\Site;

use Nemundo\Content\App\Explorer\Page\ViewPage;
use Nemundo\Web\Site\AbstractSite;

class ViewSite extends AbstractSite
{

    /**
     * @var ViewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'View';
        $this->url = 'view';
        $this->menuActive=false;
        ViewSite::$site=$this;
    }

    public function loadContent()
    {
        (new ViewPage())->render();
    }
}