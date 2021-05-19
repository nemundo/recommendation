<?php

namespace Nemundo\Content\App\Explorer\Site;

use Nemundo\Content\App\Explorer\Page\TreePage;
use Nemundo\Web\Site\AbstractSite;

class TreeSite extends AbstractSite
{

    /**
     * @var TreeSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Tree';
        $this->url = 'tree';
        TreeSite::$site=$this;
    }

    public function loadContent()
    {
        (new TreePage())->render();
    }
}