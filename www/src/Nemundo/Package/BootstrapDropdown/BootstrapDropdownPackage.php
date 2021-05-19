<?php


namespace Nemundo\Package\BootstrapDropdown;


use Nemundo\Com\Package\AbstractPackage;

class BootstrapDropdownPackage extends AbstractPackage
{

    protected function loadPackage()
    {

        $this->packageName = 'bootstrap_dropdown';

        $this->addCss('css/bootstrap-submenu.css');
        $this->addJs('js/bootstrap-submenu.js');

    }

}