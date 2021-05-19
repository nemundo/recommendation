<?php


namespace Nemundo\Content\Site;


use Nemundo\Content\Page\ContentViewPage;
use Nemundo\Package\FontAwesome\Icon\ViewIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;



class ContentViewSite extends AbstractIconSite
{

    /**
     * @var ContentViewSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'content-view';
        $this->icon = new ViewIcon();
        $this->menuActive = false;
        ContentViewSite::$site = $this;

        //new ContentEditSite($this);

    }

    public function loadContent()
    {

        (new ContentViewPage())->render();

    }


}