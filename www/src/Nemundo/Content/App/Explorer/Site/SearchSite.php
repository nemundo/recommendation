<?php

namespace Nemundo\Content\App\Explorer\Site;

use Nemundo\Content\App\Explorer\Page\SearchPage;
use Nemundo\Web\Site\AbstractSite;

class SearchSite extends AbstractSite
{

    public static $site;

    protected function loadSite()
    {
        $this->title = 'Search';
        $this->url = 'search';

        SearchSite::$site = $this;

    }

    public function loadContent()
    {
        (new SearchPage())->render();
    }
}