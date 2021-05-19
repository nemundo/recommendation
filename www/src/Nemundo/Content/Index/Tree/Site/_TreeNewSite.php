<?php

namespace Nemundo\Content\Index\Tree\Site;

use Nemundo\Content\Index\Tree\Page\TreeNewPage;
use Nemundo\Web\Site\AbstractSite;

class TreeNewSite extends AbstractSite
{

    /**
     * @var TreeNewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'TreeNew';
        $this->url = 'TreeNew';
        TreeNewSite::$site=$this;
    }

    public function loadContent()
    {
        (new TreeNewPage())->render();
    }
}