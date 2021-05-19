<?php

namespace Nemundo\Content\App\ContentPrint\Site;

use Nemundo\Content\App\ContentPrint\Page\ContentPrintPage;
use Nemundo\Web\Site\AbstractSite;

class ContentPrintSite extends AbstractSite
{

    /**
     * @var ContentPrintSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Print';
        $this->url = 'content-print';
        $this->menuActive = false;
        ContentPrintSite::$site = $this;
    }

    public function loadContent()
    {
        (new ContentPrintPage())->render();
    }
}