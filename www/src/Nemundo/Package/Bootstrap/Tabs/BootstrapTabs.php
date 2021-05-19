<?php

namespace Nemundo\Package\Bootstrap\Tabs;


use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Html\Listing\Li;
use Nemundo\Html\Listing\Ul;

use Nemundo\Web\Site\AbstractSite;

class BootstrapTabs extends Ul
{


    protected function loadContainer()
    {

        parent::loadContainer();
        $this->addCssClass('nav nav-tabs');

    }


    public function addSite(AbstractSite $site)
    {


        $active = $site->isCurrentSite();

        if ($site->showMenuAsActive) {
            $active = true;
        }

        $li = new Li($this);
        $li->addCssClass('nav-item');

        $link = new SiteHyperlink($li);
        $link->addCssClass('nav-link');
        $link->site = $site;

        if ($active) {
            $link->addCssClass('active');
        }

    }


}