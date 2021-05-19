<?php

namespace Nemundo\Content\Index\Tree\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Index\Tree\Site\Admin\TreeAdminSite;
use Nemundo\Content\Site\Admin\ContentAdminSite;


class TreeAdminTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site = TreeAdminSite::$site;

        //$nav->addSite()


    }

}