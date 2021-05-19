<?php


namespace Nemundo\App\Linux\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\App\Linux\Site\LinuxSite;
use Nemundo\App\Mail\Site\MailSite;
use Nemundo\Com\Template\AbstractTemplateDocument;

class LinuxTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site = LinuxSite::$site;

    }

}