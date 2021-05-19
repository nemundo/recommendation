<?php

namespace Nemundo\Content\App\Explorer\Site;

use Nemundo\Content\App\Explorer\Page\ChildOrderPage;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Web\Site\AbstractSite;

class ChildOrderSite extends AbstractSite
{

    /**
     * @var ChildOrderSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title[LanguageCode::EN] = 'Order';
        $this->title[LanguageCode::DE] = 'Reihenfolge';

        $this->url = 'child-order';
        $this->menuActive = false;
        ChildOrderSite::$site=$this;
    }

    public function loadContent()
    {
        (new ChildOrderPage())->render();
    }
}