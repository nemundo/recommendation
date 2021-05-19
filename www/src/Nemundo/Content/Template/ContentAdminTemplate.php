<?php


namespace Nemundo\Content\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Site\Admin\ActionAdminSite;
use Nemundo\Content\Site\Admin\ContentAdminNewSite;
use Nemundo\Content\Site\Admin\ContentAdminSite;
use Nemundo\Content\Site\Admin\ContentListingSite;
use Nemundo\Content\Site\Admin\ContentTypeSite;
use Nemundo\Content\Site\Admin\DebugSite;
use Nemundo\Content\Site\Admin\IndexTypeSite;


class ContentAdminTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->addSite(ContentAdminSite::$site);
        $nav->addSite(ContentAdminNewSite::$site);
        $nav->addSite(ContentListingSite::$site);
        $nav->addSite(ContentTypeSite::$site);
        $nav->addSite(IndexTypeSite::$site);
        $nav->addSite(ActionAdminSite::$site);
        $nav->addSite(DebugSite::$site);

    }

}