<?php


namespace Nemundo\Package\Bootstrap\Navbar;


use Nemundo\Html\Hyperlink\AbstractHyperlink;
use Nemundo\Web\WebConfig;

class BootstrapNavbarBrand extends AbstractHyperlink
{

    public function getContent()
    {

        $this->addCssClass('navbar-brand');
        $this->href = WebConfig::$webUrl;

        return parent::getContent();
    }

}