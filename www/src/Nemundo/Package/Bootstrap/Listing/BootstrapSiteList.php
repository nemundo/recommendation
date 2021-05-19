<?php

namespace Nemundo\Package\Bootstrap\Listing;


use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Html\Listing\Li;
use Nemundo\Web\Site\AbstractSite;


class BootstrapSiteList extends BootstrapList
{

    public function addSite(AbstractSite $site, $count = null)
    {

        //$li = new Li($this);
       // $li->addCssClass('list-group-item');

      //  list-group-item list-group-item-action

        $hyperlink = new SiteHyperlink($this);  // ($li);
        $hyperlink->addCssClass('list-group-item');

        $hyperlink->addCssClass('list-group-item-action');

        $hyperlink->site = $site;

        if ($count !== null) {

            $hyperlink->addCssClass('d-flex justify-content-between align-items-center');

            $badge = new BootstrapBadge($hyperlink);
            $badge->content = $count;

        }

        return $this;

    }

}