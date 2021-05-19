<?php

namespace Nemundo\Package\FontAwesome\IconSite;


use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Web\Site\AbstractSiteTree;


// nach Nemundo/Office/Excel/Site
abstract class AbstractExcelSite extends AbstractIconSite
{

    public function __construct(AbstractSiteTree $site = null)
    {

        $this->title = 'Excel Export';
        $this->url = 'excel-export';

        parent::__construct($site);

        $this->icon->icon = 'file-excel';
       // $this->icon->iconSize = 2;

    }

}