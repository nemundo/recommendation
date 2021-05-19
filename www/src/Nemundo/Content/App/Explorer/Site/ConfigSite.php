<?php

namespace Nemundo\Content\App\Explorer\Site;

use Nemundo\Content\App\Explorer\Page\ConfigPage;
use Nemundo\Web\Site\AbstractSite;

class ConfigSite extends AbstractSite
{
    protected function loadSite()
    {

        $this->title = 'Config';
        $this->url = 'config';

       // new ContentTypeConfigSite($this);
        //new AppConfigSite($this);

    }

    public function loadContent()
    {

        (new ConfigPage())->render();

       // (new ConfigPage())->render();
    }
}