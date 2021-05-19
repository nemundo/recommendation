<?php

namespace Nemundo\Content\App\Explorer\Site;

use Nemundo\Content\App\Explorer\Page\MoveToPage;
use Nemundo\Web\Site\AbstractSite;

class MoveToSite extends AbstractSite
{

    /**
     * @var MoveToSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Move to ...';
        $this->url = 'MoveTo';
        $this->menuActive=false;
        MoveToSite::$site = $this;
    }

    public function loadContent()
    {
        (new MoveToPage())->render();
    }
}