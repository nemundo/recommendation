<?php


namespace Nemundo\Content\App\File\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\File\Site\FileSite;

class FileTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site = FileSite::$site;

    }

}