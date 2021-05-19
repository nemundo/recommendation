<?php

namespace Nemundo\Content\App\Explorer\Site;

use Nemundo\Content\App\Explorer\Page\ListingPage;
use Nemundo\Web\Site\AbstractSite;


class ListingSite extends AbstractSite
{

    /**
     * @var ListingSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Listing';
        $this->url = 'list';
        ListingSite::$site = $this;
    }

    public function loadContent()
    {
        (new ListingPage())->render();
    }
}