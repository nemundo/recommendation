<?php

namespace Nemundo\Web\Site;


abstract class AbstractWildcardSite extends AbstractSite
{

    /**
     * @var string
     */
    public $wildcardUrl;

    abstract function checkWildcardUrl();


    public function __construct(AbstractSiteTree $site = null)
    {
        parent::__construct($site);
        $this->url = '';
        $this->menuActive = false;
    }

    protected function loadSite()
    {

    }

}