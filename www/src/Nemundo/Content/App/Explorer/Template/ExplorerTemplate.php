<?php


namespace Nemundo\Content\App\Explorer\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;

class ExplorerTemplate extends AbstractTemplateDocument
{

    use LibraryTrait;

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site = ExplorerSite::$site;

    }

}