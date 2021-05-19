<?php


namespace Nemundo\Content\App\Translation\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Translation\Site\TranslationSite;

class TranslationTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {
        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site =TranslationSite::$site;

    }

}