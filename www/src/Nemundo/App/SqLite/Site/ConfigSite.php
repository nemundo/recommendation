<?php


namespace Nemundo\App\SqLite\Site;


use Nemundo\App\SqLite\Page\ConfigPage;
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