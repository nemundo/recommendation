<?php

namespace Hackathon\Site;

use Hackathon\Page\HomePage;
use Nemundo\Web\Site\AbstractSite;

class HomeSite extends AbstractSite
{

    /**
     * @var HomeSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Home';
        $this->url = '';
        $this->menuActive=false;

        HomeSite::$site=$this;



    }

    public function loadContent()
    {
        (new HomePage())->render();
    }
}