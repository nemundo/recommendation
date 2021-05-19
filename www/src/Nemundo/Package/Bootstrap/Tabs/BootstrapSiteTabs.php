<?php

namespace Nemundo\Package\Bootstrap\Tabs;


use Nemundo\Web\Parameter\AbstractUrlParameter;
use Nemundo\Web\Site\AbstractSite;


class BootstrapSiteTabs extends BootstrapTabs
{

    /**
     * @var AbstractSite
     */
    public $site;

    /**
     * @var AbstractUrlParameter
     */
    public $parameter;


    public function getContent()
    {

        if ($this->site !== null) {

            $baseSite = clone($this->site);
            if ($this->parameter !== null) {
                $baseSite->addParameter($this->parameter);
            }
            $this->addSite($baseSite);

            foreach ($this->site->getMenuActiveSite() as $site) {

                $siteNew = clone($site);

                if ($this->parameter !== null) {
                    $siteNew->addParameter($this->parameter);
                }

                if ($siteNew->hasMenuActiveItems()) {

                    $li = new BootstrapSiteTabsDropdown($this);
                    $li->site = $siteNew;

                } else {

                    $this->addSite($siteNew);

                }

            }

        }

        return parent::getContent();

    }

}