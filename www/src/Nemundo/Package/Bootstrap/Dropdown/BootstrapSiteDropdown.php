<?php

namespace Nemundo\Package\Bootstrap\Dropdown;

use Nemundo\Com\Container\ContainerUserRestrictionTrait;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Button\Button;

use Nemundo\Web\Site\AbstractSite;

class BootstrapSiteDropdown extends BootstrapDropdown
{

    use ContainerUserRestrictionTrait;

    public function addSite(AbstractSite $site)
    {

        $hyperlink = new SiteHyperlink($this->dropdownDiv);
        $hyperlink->addCssClass('dropdown-item');
        $hyperlink->content = 'menu 1';

        $hyperlink->content = $site->title;
        $hyperlink->site = $site;

        $hyperlink->restricted = $site->restricted;
        foreach ($site->getRestrictedUsergroupList() as $usergroup) {
            $hyperlink->addRestrictedUsergroup($usergroup);
        }

    }

}