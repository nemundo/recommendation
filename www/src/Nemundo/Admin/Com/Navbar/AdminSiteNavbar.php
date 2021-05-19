<?php

namespace Nemundo\Admin\Com\Navbar;


namespace Nemundo\Admin\Com\Navbar;


use Nemundo\App\UserAction\Site\LogoutSite;
use Nemundo\App\UserAction\Site\PasswordChangeSite;
use Nemundo\Package\Bootstrap\Autocomplete\AbstractAutocompleteJsonSite;
use Nemundo\Package\Bootstrap\Navbar\BootstrapNavbarBrand;
use Nemundo\Package\Bootstrap\Navbar\BootstrapNavbarLogo;
use Nemundo\Package\Bootstrap\Navbar\BootstrapNavbarSearchForm;
use Nemundo\Package\Bootstrap\Navbar\BootstrapNavbarToggler;
use Nemundo\Package\Bootstrap\Navbar\BootstrapSiteNavbar;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\BaseUrlSite;


// ContentSiteNavbar
// ContentAppSiteNavbar


// AdminNavbar
class AdminSiteNavbar extends BootstrapSiteNavbar
{

    public $logoUrl;

    public $brand = 'Home';

    /**
     * @var bool
     */
    public $searchMode = false;

    /**
     * @var AbstractSite
     */
    public $searchSite;

    /**
     * @var AbstractAutocompleteJsonSite
     */
    public $searchSourceSite;


    /**
     * @var bool
     */
    public $showPasswordChange = true;

    public function getContent()
    {


        if ($this->logoUrl !== null) {
            $logo = new BootstrapNavbarLogo();
            $logo->logoSite = new BaseUrlSite();
            $logo->logoUrl = $this->logoUrl;



            $this->containerDiv->addContainerAtFirst($logo);
        } else {

            $brand = new BootstrapNavbarBrand();
            $brand->content = $this->brand;
            $this->containerDiv->addContainerAtFirst($brand);

        }


        $toggler = new BootstrapNavbarToggler();
        $this->containerDiv->addContainerAtFirst($toggler);

        if ($this->searchMode) {

            $search = new BootstrapNavbarSearchForm($this);
            $search->site = $this->searchSite;
            $search->sourceSite = $this->searchSourceSite;

        }


        if ($this->userMode) {

            if ($this->showPasswordChange) {
                $this->addUserMenuSite(PasswordChangeSite::$site);
                $this->addUserMenuDivider();
            }

            $this->addUserMenuSite(LogoutSite::$site);
        }

        return parent::getContent();

    }

}

