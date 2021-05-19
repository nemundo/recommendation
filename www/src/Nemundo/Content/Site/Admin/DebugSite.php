<?php

namespace Nemundo\Content\Site\Admin;

use Nemundo\Content\Page\Admin\DebugPage;
use Nemundo\Web\Site\AbstractSite;

class DebugSite extends AbstractSite
{

    /**
     * @var DebugSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Debug';
        $this->url = 'debug';

        DebugSite::$site = $this;

    }


    public function loadContent()
    {
        (new DebugPage())->render();
    }

}