<?php

namespace Nemundo\Content\Index\Tree\Site;


use Nemundo\Content\Index\Tree\Page\ViewEditPage;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;

class ViewEditSite extends AbstractEditIconSite
{

    /**
     * @var ViewEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'View Edit';
        $this->url = 'view-edit';

        ViewEditSite::$site = $this;
    }

    public function loadContent()
    {

        (new ViewEditPage())->render();

    }
}