<?php

namespace Nemundo\Content\App\Share\Site;

use Nemundo\Content\App\Share\Page\PrivateShareContentPage;
use Nemundo\Web\Site\AbstractSite;

class PrivateShareContentSite extends AbstractSite
{

    /**
     * @var PrivateShareContentSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'PrivateShare-Content';
        $this->url = 'private-share-content';
        $this->menuActive = false;

        PrivateShareContentSite::$site = $this;

    }

    public function loadContent()
    {

        (new PrivateShareContentPage())->render();

    }
}