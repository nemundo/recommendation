<?php

namespace Nemundo\Content\App\Dashboard\Site\Admin;

use Nemundo\Content\App\Dashboard\Page\Admin\ConfigPage;
use Nemundo\Web\Site\AbstractSite;

class ConfigSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Config';
        $this->url = 'config';
    }

    public function loadContent()
    {

        (new ConfigPage())->render();

    }
}