<?php


namespace Nemundo\App\SqLite\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\App\SqLite\Site\SqLiteSite;
use Nemundo\Com\Template\AbstractTemplateDocument;

class SqLiteTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site = SqLiteSite::$site;

    }

}