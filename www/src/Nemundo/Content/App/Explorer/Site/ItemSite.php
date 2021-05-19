<?php

namespace Nemundo\Content\App\Explorer\Site;

use Nemundo\Content\App\Explorer\Content\Base\BaseContainerContentType;
use Nemundo\Content\App\Explorer\Page\ItemPage;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Package\FontAwesome\Icon\ViewIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;

class ItemSite extends AbstractIconSite
{

    /**
     * @var ItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Tree';
        $this->url = 'tree';
        $this->icon = new ViewIcon();
        $this->menuActive =true; // false;
        ItemSite::$site = $this;

        new NewSite($this);

    }

    public function loadContent()
    {

        $contentParameter = new ContentParameter();
        if ($contentParameter->notExists()) {
            $site = clone(ItemSite::$site);
            $site->addParameter(new ContentParameter((new BaseContainerContentType())->getContentId()));
            $site->redirect();
        }

        (new ItemPage())->render();

    }
}