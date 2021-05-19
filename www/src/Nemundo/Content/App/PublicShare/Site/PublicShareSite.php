<?php

namespace Nemundo\Content\App\PublicShare\Site;

use Nemundo\Content\App\PublicShare\Page\PublicSharePage;
use Nemundo\Web\Site\AbstractSite;

class PublicShareSite extends AbstractSite
{

    /**
     * @var PublicShareSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Public Share';
        $this->url = 'public-share';
        $this->menuActive = false;
        PublicShareSite::$site=$this;

        new FullPagePublicShareSite($this);

    }

    public function loadContent()
    {
        (new PublicSharePage())->render();

    }
}