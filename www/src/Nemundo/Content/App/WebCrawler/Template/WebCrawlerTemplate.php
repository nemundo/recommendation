<?php


namespace Nemundo\Content\App\WebCrawler\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\TimeSeries\Site\TimeSeriesSite;
use Nemundo\Content\App\WebCrawler\Site\WebCrawlerSite;

class WebCrawlerTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site = WebCrawlerSite::$site;

    }

}