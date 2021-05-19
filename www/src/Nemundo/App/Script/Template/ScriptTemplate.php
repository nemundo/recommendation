<?php


namespace Nemundo\App\Script\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\App\Script\Site\ScriptSite;
use Nemundo\Com\Template\AbstractTemplateDocument;

class ScriptTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site = ScriptSite::$site;

    }

}