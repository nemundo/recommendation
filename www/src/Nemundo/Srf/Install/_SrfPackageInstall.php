<?php


namespace Nemundo\Srf\Install;

use Nemundo\Com\Package\PackageSetup;
use Nemundo\Package\NemundoJs\NemundoJsPackage;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Srf\Package\SrfPackage;

class SrfPackageInstall extends AbstractInstall
{

    public function install()
    {

        (new PackageSetup())
            ->addPackage(new NemundoJsPackage())
            ->addPackage(new SrfPackage());

    }

}