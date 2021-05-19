<?php

namespace Nemundo\App\Help\Site;

use Nemundo\App\Help\Page\HelpPage;
use Nemundo\Web\Site\AbstractSite;

class HelpSite extends AbstractSite
{

    /**
     * @var HelpSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Help';
        $this->url = 'help';

        HelpSite::$site=$this;

    }

    public function loadContent()
    {
        (new HelpPage())->render();
    }
}