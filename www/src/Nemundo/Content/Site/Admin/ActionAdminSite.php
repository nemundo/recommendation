<?php


namespace Nemundo\Content\Site\Admin;



use Nemundo\Content\Page\Admin\ActionAdminPage;
use Nemundo\Content\Page\Admin\ContentTypePage;
use Nemundo\Web\Site\AbstractSite;

class ActionAdminSite extends AbstractSite
{

    /**
     * @var ActionAdminSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Action';
        $this->url = 'content-action';
        ActionAdminSite::$site = $this;

    }

    public function loadContent()
    {

        (new ActionAdminPage())->render();

    }


}