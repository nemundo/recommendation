<?php

namespace Nemundo\Content\App\Explorer\Site;

use Nemundo\Content\App\Explorer\Page\AttachToPage;
use Nemundo\Web\Site\AbstractSite;

class AttachToSite extends AbstractSite
{

    /**
     * @var AttachToPage
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Attach to ...';
        $this->url = 'attach-to';
        $this->menuActive = false;
        AttachToSite::$site = $this;

    }

    public function loadContent()
    {
        (new AttachToPage())->render();
    }
}