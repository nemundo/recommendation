<?php

namespace Nemundo\Content\App\Explorer\Site;

use Nemundo\Content\App\Explorer\Page\PrintPage;
use Nemundo\Web\Site\AbstractSite;

class PrintSite extends AbstractSite
{

    /**
     * @var PrintSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Print';
        $this->url = 'print';
        $this->menuActive=false;
        PrintSite::$site = $this;
    }

    public function loadContent()
    {
        (new PrintPage())->render();
    }
}