<?php


namespace Nemundo\Content\App\Dashboard\Site\Edit;


use Nemundo\Content\App\Dashboard\Page\Edit\ContentNewPage;
use Nemundo\Content\App\Dashboard\Page\Edit\DashboardEditPage;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Icon\PlusIcon;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;


class ContentNewSite extends AbstractEditIconSite
{

    /**
     * @var ContentNewSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Content New';
        $this->url = 'content-new';
        $this->menuActive = false;
        
        ContentNewSite::$site = $this;

    }


    public function loadContent()
    {

        (new ContentNewPage())->render();

    }

}