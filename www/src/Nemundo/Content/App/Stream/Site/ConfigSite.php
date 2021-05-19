<?php

namespace Nemundo\Content\App\Stream\Site;

use Nemundo\Content\App\Stream\Page\ConfigPage;
use Nemundo\Web\Site\AbstractSite;

class ConfigSite extends AbstractSite
{

    /**
     * @var ConfigSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Stream Config';
        $this->url = 'stream-config';

        ConfigSite::$site=$this;

    }

    public function loadContent()
    {
        (new ConfigPage())->render();
    }
}