<?php

namespace Nemundo\Package\Bootstrap\Breadcrumb;


use Nemundo\Com\Html\Hyperlink\SiteHyperlink;

use Nemundo\Html\Listing\AbstractLi;
use Nemundo\Html\Listing\Li;
use Nemundo\Html\Listing\OrderedList;

use Nemundo\Web\Site\AbstractSite;



class BootstrapBreadcrumb extends OrderedList
{


    /**
     * @var AbstractLi[]
     */
    //private $liList=[];


    public function addSite(AbstractSite $site)
    {

        $li = new Li($this);
        $li->addCssClass('breadcrumb-item');

        $li->addCssClass('active');
        $hyperlink = new SiteHyperlink($li);
        $hyperlink->site = $site;

    }


    /*
    public function addItem(AbstractSite $site, $label = null)
    {

        if ($label == null) {
            $label = $site->title;
        }

        $li = new Li($this);
        $li->addCssClass('breadcrumb-item');

        $li->addCssClass('active');
        new SiteHyperlink($li);

    }*/


    public function addActiveItem($label)
    {

        $li = new Li($this);
        $li->addCssClass('breadcrumb-item');

        $li->addContent($label);

    }


    public function getContent()
    {

        $this->addCssClass('breadcrumb');

        return parent::getContent();

    }

}