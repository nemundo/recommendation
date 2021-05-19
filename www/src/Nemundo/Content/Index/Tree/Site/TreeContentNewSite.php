<?php


namespace Nemundo\Content\Index\Tree\Site;


use Nemundo\Content\Index\Tree\Page\TreeContentNewPage;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;


class TreeContentNewSite extends AbstractEditIconSite
{

    /**
     * @var TreeContentNewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title='New';
        $this->url = 'content-new';
        TreeContentNewSite::$site = $this;
    }

    public function loadContent()
    {

        (new TreeContentNewPage())->render();

    }

}