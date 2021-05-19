<?php


namespace Nemundo\Content\App\TimeSeries\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\TimeSeries\Site\TimeSeriesSite;

class TimeSeriesTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site = TimeSeriesSite::$site;

    }

}