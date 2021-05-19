<?php

namespace Nemundo\Content\App\Explorer\Site\Mobile;

use Nemundo\Content\App\Explorer\Page\Mobile\NewMobilePage;
use Nemundo\Content\App\Explorer\Page\NewPage;
use Nemundo\Web\Site\AbstractSite;

class NewMobileSite extends AbstractSite
{

    /**
     * @var NewMobileSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'New';
        $this->url = 'new';
        $this->menuActive = false;
        NewMobileSite::$site = $this;
    }

    public function loadContent()
    {
        //(new NewPage())->render();

        (new NewMobilePage())->render();

    }
}