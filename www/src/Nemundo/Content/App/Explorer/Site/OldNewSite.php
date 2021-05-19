<?php

namespace Nemundo\Content\App\Explorer\Site;

use Nemundo\Content\App\Explorer\Page\OldNewPage;
use Nemundo\Web\Site\AbstractSite;

class OldNewSite extends AbstractSite
{

    /**
     * @var OldNewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'New';
        $this->url = 'new';
        //$this->menuActive = false;
        OldNewSite::$site = $this;
    }

    public function loadContent()
    {
        (new OldNewPage())->render();
    }
}