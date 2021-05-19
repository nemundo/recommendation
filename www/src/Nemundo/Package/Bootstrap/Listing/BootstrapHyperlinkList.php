<?php

namespace Nemundo\Package\Bootstrap\Listing;


use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Html\Hyperlink\Hyperlink;
use Nemundo\Html\Listing\Li;


// SiteList
class BootstrapHyperlinkList extends BootstrapList
{

    public function addHyperlink($label, $url = '#')
    {

        $li = new Li($this);
        $li->addCssClass('list-group-item');

        $hyperlink = new UrlHyperlink($li);
        $hyperlink->content = $label;
        $hyperlink->url = $url;

        return $this;
    }


    public function addActiveHyperlink($label)
    {

        $li = new Li($this);
        $li->addCssClass('list-group-item');

        $hyperlink = new Hyperlink($li);
        $hyperlink->addCssClass('list-group-item active');
        $hyperlink->content = $label;

    }

}