<?php

namespace Nemundo\Content\App\Explorer\Site;

use Nemundo\Content\App\Explorer\Page\NewPage;
use Nemundo\Web\Site\AbstractSite;

class NewSite extends AbstractSite
{

    /**
     * @var NewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'New';
        $this->url = 'new';
        $this->menuActive = false;
        NewSite::$site = $this;
    }

    public function loadContent()
    {
        (new NewPage())->render();
    }
}