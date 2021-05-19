<?php

namespace Nemundo\App\Mail\Site;

use Nemundo\App\Mail\Page\ConfigPage;
use Nemundo\Web\Site\AbstractSite;

class ConfigSite extends AbstractSite
{

    /**
     * @var ConfigSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Config';
        $this->url = 'config';

        new MailServerDeleteSite($this);

        ConfigSite::$site = $this;
    }

    public function loadContent()
    {
        (new ConfigPage())->render();
    }
}