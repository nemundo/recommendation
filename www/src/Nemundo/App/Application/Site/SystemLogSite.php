<?php

namespace Nemundo\App\Application\Site;

use Nemundo\App\Application\Page\SystemLogPage;
use Nemundo\Web\Site\AbstractSite;

class SystemLogSite extends AbstractSite
{

    /**
     * @var SystemLogSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'System Log';
        $this->url = 'system-log';
        SystemLogSite::$site = $this;
    }

    public function loadContent()
    {
        (new SystemLogPage())->render();
    }
}