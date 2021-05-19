<?php

namespace Nemundo\Content\App\WebCrawler\Site;

use Nemundo\Content\App\WebCrawler\Page\WebCrawlerPage;
use Nemundo\Web\Site\AbstractSite;

class WebCrawlerSite extends AbstractSite
{

    /**
     * @var WebCrawlerSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Web Crawler';
        $this->url = 'web-crawler';
        WebCrawlerSite::$site = $this;

        new DomainNewSite($this);

    }

    public function loadContent()
    {
        (new WebCrawlerPage())->render();
    }
}