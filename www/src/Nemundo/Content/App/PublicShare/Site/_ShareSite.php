<?php

namespace Nemundo\Content\App\Explorer\Site\_Share;

use Nemundo\Content\App\PublicShare\Page\PublicSharePage;
use Nemundo\Web\Site\AbstractSite;

class ShareSite extends AbstractSite
{

    /**
     * @var ShareSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Public Share';
        $this->url = 'public-share';
        $this->menuActive = false;
        ShareSite::$site=$this;
    }

    public function loadContent()
    {
        (new PublicSharePage())->render();

    }
}