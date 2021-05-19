<?php


namespace Nemundo\Content\App\Webcam\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Webcam\Site\WebcamSite;

class WebcamTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {
        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site = WebcamSite::$site;


    }

}