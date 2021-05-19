<?php

namespace Nemundo\Web\Site;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Web\WebConfig;

abstract class AbstractSiteTree extends AbstractBaseClass
{

    /**
     * @var AbstractSite[]
     */
    private $siteList = [];


    public function addSite(AbstractSite $site)
    {
        $this->siteList[] = $site;
        return $this;
    }

    /**
     * @return AbstractSite[]
     */
    public function getSiteList()
    {
        $list = $this->siteList;
        return $list;
    }


    /**
     * @return AbstractSite[]
     */
    public function getAllSiteList()
    {
        $list = $this->getIterativeSite($this);
        return $list;
    }


    /**
     * @return AbstractSite[]
     */
    public function getMenuActiveSite()
    {

        $list = [];
        foreach ($this->getSiteList() as $site) {

            if ($site->isMenuVisible()) {
                $list[] = $site;
            }

        }

        return $list;

    }


    /**
     * @param AbstractSiteTree $site
     * @return AbstractSite[]
     */
    private function getIterativeSite(AbstractSiteTree $site)
    {

        $list = [];
        if ($site->hasItems()) {
            foreach ($site->getSiteList() as $subSite) {
                $list[] = $subSite;
                $list = array_merge($list, $this->getIterativeSite($subSite));
            }
        }

        return $list;
    }


    public function hasItems()
    {
        $returnValue = false;
        if ($this->getCount() > 0) {
            $returnValue = true;
        }
        return $returnValue;
    }


    public function hasMenuActiveItems()
    {

        $returnValue = false;

        $count = 0;
        foreach ($this->getMenuActiveSite() as $site) {
            $count++;
            $returnValue = true;
        }

        return $returnValue;

    }


    public function getCount()
    {
        $count = sizeof($this->siteList);
        return $count;
    }


    public function getUrl()
    {
        $url = WebConfig::$webUrl;
        return $url;
    }

}