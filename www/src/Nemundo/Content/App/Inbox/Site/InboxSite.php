<?php

namespace Nemundo\Content\App\Inbox\Site;

use Nemundo\Content\App\Inbox\Page\InboxPage;
use Nemundo\Web\Site\AbstractSite;

class InboxSite extends AbstractSite
{

    /**
     * @var InboxSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Inbox';
        $this->url = 'inbox';
        InboxSite::$site=$this;
    }

    public function loadContent()
    {
        (new InboxPage())->render();
    }
}