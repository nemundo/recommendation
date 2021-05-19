<?php

namespace Nemundo\Content\App\Timeline\Site;

use Nemundo\Content\App\Timeline\Page\ItemPage;
use Nemundo\Web\Site\AbstractSite;

class ItemSite extends AbstractSite
{

    /**
     * @var ItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Item';
        $this->url = 'item';

        ItemSite::$site=$this;

    }

    public function loadContent()
    {
        (new ItemPage())->render();
    }
}