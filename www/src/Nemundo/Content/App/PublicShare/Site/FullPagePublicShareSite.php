<?php

namespace Nemundo\Content\App\PublicShare\Site;

use Nemundo\Content\App\PublicShare\Page\FullPagePublicSharePage;
use Nemundo\Web\Site\AbstractSite;

class FullPagePublicShareSite extends AbstractSite
{

    /**
     * @var FullPagePublicShareSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Full Page Public Share';
        $this->url = 'full-page-public-share';
        $this->menuActive = false;
        FullPagePublicShareSite::$site = $this;
    }

    public function loadContent()
    {
        (new FullPagePublicSharePage())->render();

    }
}