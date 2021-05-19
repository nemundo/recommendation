<?php

namespace Nemundo\Content\App\Explorer\Site;

use Nemundo\Content\App\Explorer\Page\ContentEditPage;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;
use Nemundo\Web\Site\AbstractSite;

class ContentEditSite extends AbstractEditIconSite
{

    /**
     * @var ContentEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Edit';
        $this->url = 'edit';
        $this->menuActive=false;
        ContentEditSite::$site = $this;
    }

    public function loadContent()
    {
        (new ContentEditPage())->render();
    }
}