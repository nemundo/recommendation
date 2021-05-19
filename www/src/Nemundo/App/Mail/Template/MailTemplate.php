<?php


namespace Nemundo\App\Mail\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\App\Mail\Site\MailSite;
use Nemundo\Com\Template\AbstractTemplateDocument;

class MailTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site = MailSite::$site;

    }

}