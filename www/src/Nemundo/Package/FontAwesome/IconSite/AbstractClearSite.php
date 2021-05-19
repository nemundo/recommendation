<?php

namespace Nemundo\Package\FontAwesome\IconSite;


use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Web\Site\AbstractSiteTree;

abstract class AbstractClearSite extends AbstractIconSite
{

    public function __construct(AbstractSiteTree $site = null)
    {

        $this->title = 'Clear';
        $this->url = 'clear-filter';

        parent::__construct($site);

        $this->icon->icon = 'times';
        $this->icon->iconSize = 2;

    }

}