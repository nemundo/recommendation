<?php

namespace Nemundo\Content\App\Explorer\Site;

use Nemundo\Content\App\Explorer\Page\AccessPage;
use Nemundo\Web\Site\AbstractSite;

class AccessSite extends AbstractSite
{

    /**
     * @var AccessSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Access';
        $this->url = 'Access';
        $this->menuActive = false;
        AccessSite::$site = $this;
    }

    public function loadContent()
    {
        (new AccessPage())->render();
    }
}