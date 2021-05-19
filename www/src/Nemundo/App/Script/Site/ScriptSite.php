<?php

namespace Nemundo\App\Script\Site;


use Nemundo\App\Script\Page\ScriptPage;
use Nemundo\Web\Site\AbstractSite;

class ScriptSite extends AbstractSite
{

    /**
     * @var ScriptSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Script';
        $this->url = 'script';

        new ScriptRunSite($this);

        ScriptSite::$site = $this;

    }


    public function loadContent()
    {

        (new ScriptPage())->render();

    }

}