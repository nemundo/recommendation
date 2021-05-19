<?php

namespace Nemundo\Content\App\Explorer\Site;

use Nemundo\Content\App\Explorer\Page\ContentPage;
use Nemundo\Web\Site\AbstractSite;

class ContentSite extends AbstractSite
{

    /**
     * @var ContentSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Content';
        $this->url = 'content';

        ContentSite::$site = $this;

    }

    public function loadContent()
    {
        (new ContentPage())->render();
    }
}