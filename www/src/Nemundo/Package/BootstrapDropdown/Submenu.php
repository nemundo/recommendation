<?php


namespace Nemundo\Package\BootstrapDropdown;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Web\Site\AbstractSite;

class Submenu extends AbstractBase
{

    public $label;


    /**
     * @var AbstractSite[]
     */
    private $siteList = [];


    public function __construct(BootstrapSubmenuDropdown $dropdown)
    {
        $dropdown->addSubmenu($this);
    }


    public function addSite(AbstractSite $site)
    {

        $this->siteList[] = $site;
        return $this;

    }


    public function getSiteList()
    {
        return $this->siteList;
    }


}