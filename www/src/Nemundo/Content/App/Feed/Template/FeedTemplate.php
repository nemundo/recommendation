<?php


namespace Nemundo\Content\App\Feed\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Feed\Site\FeedSite;

class FeedTemplate extends AbstractTemplateDocument
{

    public function loadContainer()
    {

        parent::loadContainer();

        $nav=new AdminNavigation($this);
        $nav->site=FeedSite::$site;



    }

}