<?php

namespace Nemundo\Package\FontAwesome\Site;


use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\AbstractSiteTree;


abstract class AbstractIconSite extends AbstractSite
{

    use IconSiteTrait;

    public function __construct(AbstractSiteTree $site = null)
    {

        $this->loadIcon();
        parent::__construct($site);

    }


    protected function loadSite()
    {

    }

}