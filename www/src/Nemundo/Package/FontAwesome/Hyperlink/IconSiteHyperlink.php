<?php

namespace Nemundo\Package\FontAwesome\Hyperlink;


use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;

class IconSiteHyperlink extends SiteHyperlink
{

    /**
     * @var AbstractIconSite
     */
    public $site;

    protected function loadContainer()
    {

        parent::loadContainer();
        $this->showSiteTitle = false;

    }


    public function getContent()
    {

        $this->addContainer($this->site->icon);
        $this->title = $this->site->title;

        return parent::getContent();
    }

}