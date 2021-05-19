<?php

namespace Nemundo\App\UserAction\Widget;


use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\App\Mail\Site\MyMailQueueSite;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Package\Bootstrap\Button\BootstrapSiteButton;
use Nemundo\User\Session\UserSession;

class UsergroupMembershipWidget extends AbstractAdminWidget
{

    protected function loadWidget()
    {

        // User Information
        // Log etc.

        $this->widgetTitle = 'Usergroup Membership';
    }

    public function getContent()
    {

        $list = new UnorderedList($this);
        foreach ((new UserSession())->getUsergroup() as $usergroupRow) {
            //$list->addText($usergroupRow->usergroup . ' (' . $usergroupRow->application->application . ')');
            $list->addText($usergroupRow->usergroup);
        }

        $btn = new BootstrapSiteButton($this);
        $btn->site = MyMailQueueSite::$site;

        return parent::getContent();

    }

}