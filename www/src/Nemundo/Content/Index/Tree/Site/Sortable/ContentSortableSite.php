<?php

namespace Nemundo\Content\Index\Tree\Site\Sortable;


use Nemundo\Content\Index\Tree\Page\Sortable\ChildOrderPage;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Web\Site\AbstractSite;

class ContentSortableSite extends AbstractSite
{

    /**
     * @var ContentSortableSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title[LanguageCode::EN] = 'Order';
        $this->title[LanguageCode::DE] = 'Reihenfolge';

        $this->url = 'child-order';
        $this->menuActive = false;
        ContentSortableSite::$site=$this;

        new ContentSortableJsonSite($this);

    }

    public function loadContent()
    {
        (new ChildOrderPage())->render();

    }
}