<?php


namespace Nemundo\Content\Index\Geo\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Index\Geo\Site\GeoIndexSite;

class GeoIndexTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site = GeoIndexSite::$site;


    }

}