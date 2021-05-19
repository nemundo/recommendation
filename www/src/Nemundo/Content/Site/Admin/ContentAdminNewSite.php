<?php


namespace Nemundo\Content\Site\Admin;


use Nemundo\Content\Page\Admin\ContentAdminNewPage;
use Nemundo\Web\Site\AbstractSite;


class ContentAdminNewSite extends AbstractSite
{

    /**
     * @var ContentAdminNewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'New';
        $this->url = 'content-new';
        $this->menuActive=false;

        ContentAdminNewSite::$site = $this;
    }


    public function loadContent()
    {

        (new ContentAdminNewPage())->render();

    }

}