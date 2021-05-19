<?php

namespace Nemundo\Content\Site\Admin;

use Nemundo\Content\Page\Admin\DebugPage;
use Nemundo\Content\Page\Admin\IndexTypePage;
use Nemundo\Web\Site\AbstractSite;

class IndexTypeSite extends AbstractSite
{

    /**
     * @var IndexTypeSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Index Type';
        $this->url = 'index-type';

        IndexTypeSite::$site = $this;

    }


    public function loadContent()
    {

        (new IndexTypePage())->render();

    }

}