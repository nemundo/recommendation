<?php

namespace Nemundo\Content\App\Camera\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Camera\Site\CameraSite;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;

class CameraTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site =CameraSite::$site;

    }

}