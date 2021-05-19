<?php

namespace Nemundo\Content\Com\Navbar;


use Nemundo\Admin\Com\Navbar\AdminSiteNavbar;
use Nemundo\App\UserAction\Site\LogoutSite;
use Nemundo\App\UserAction\Site\PasswordChangeSite;
use Nemundo\Content\Index\Search\Site\Json\SearchJsonSite;
use Nemundo\Content\Index\Search\Site\SearchSite;

class ContentSiteNavbar extends AdminSiteNavbar
{

    /**
     * @var bool
     */
   // public $showPasswordChange = true;

    protected function loadContainer()
    {
        parent::loadContainer();

        //$this->searchMode = true;
        //$this->userMode = true;

        $this->searchSite = SearchSite::$site;
        $this->searchSourceSite = SearchJsonSite::$site;

    }


    public function getContent()
    {

      /*  if ($this->showPasswordChange) {
            $this->addUserMenuSite(PasswordChangeSite::$site);
            $this->addUserMenuDivider();
        }

        $this->addUserMenuSite(LogoutSite::$site);*/

        return parent::getContent();

    }

}