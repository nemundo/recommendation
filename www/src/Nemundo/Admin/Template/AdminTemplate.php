<?php

namespace Nemundo\Admin\Template;

use Nemundo\Admin\AdminConfig;
use Nemundo\Admin\Com\Navbar\AdminSiteNavbar;
use Nemundo\App\Manifest\Com\JavaScript\WebManifestJavaScript;
use Nemundo\App\Manifest\Com\Link\WebManifestLink;
use Nemundo\Com\Html\Header\LibraryHeader;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Package\Bootstrap\Document\BootstrapDocument;
use Nemundo\Package\Bootstrap\Layout\Container\BootstrapContainer;
use Nemundo\Package\Bootstrap\Navbar\BootstrapSiteNavbar;
use Nemundo\Package\FontAwesome\FontAwesomePackage;
use Nemundo\Package\Jquery\Container\JqueryHeader;
use Nemundo\Package\Jquery\Package\JqueryPackage;
use Nemundo\Package\NemundoJs\NemundoJsPackage;
use Nemundo\Package\OpenGraph\OpenGraph;
use Nemundo\Package\TwitterCard\TwitterCard;
use Nemundo\Web\WebConfig;

class AdminTemplate extends BootstrapDocument
{

    /**
     * @var BootstrapContainer
     */
    private $container;

    /**
     * @var BootstrapSiteNavbar
     */
    protected $navbar;


    protected function loadContainer()
    {

        parent::loadContainer();

        $this->addPackage(new NemundoJsPackage());
        $this->addPackage(new JqueryPackage());
        $this->addPackage(new FontAwesomePackage());

        $this->addJavaScript('WebConfig.webUrl = "' . WebConfig::$webUrl . '";');

        $this->navbar = new AdminSiteNavbar();
        $this->navbar->site = AdminConfig::$webController;
        $this->navbar->userMode = AdminConfig::$userMode;
        $this->navbar->showPasswordChange = AdminConfig::$showPasswordChange;
        //$this->navbar->fixed = true;

        if (AdminConfig::$logoUrl !== null) {
            $this->navbar->logoUrl = AdminConfig::$logoUrl;
        } else {
            $this->navbar->brand = LibraryHeader::$documentTitle;
        }

        parent::addContainer($this->navbar);

        $this->container = new BootstrapContainer();
        $this->container->id = 'main';
        $this->container->fullWidth = true;

        parent::addContainer($this->container);

    }


    public function addContainer(AbstractContainer $container)
    {
        $this->container->addContainer($container);
    }


    public function getContent()
    {

        new JqueryHeader($this);

        LibraryHeader::addHeaderContainer(new OpenGraph());
        LibraryHeader::addHeaderContainer(new TwitterCard());

        if (AdminConfig::$webManifest) {
            LibraryHeader::addHeaderContainer(new WebManifestLink());
            LibraryHeader::addHeaderContainer(new WebManifestJavaScript());
        }

        return parent::getContent();

    }

}