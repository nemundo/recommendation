<?php


namespace Nemundo\App\Application\Copy;


use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\Com\Package\PackageSetup;
use Nemundo\Core\Base\AbstractBase;

class AppPackageCopy extends AbstractBase
{

    public $destinationPath;

    public function copyPackage()
    {


        $packageList = [];

        $applicationReader = new ApplicationReader();
        $applicationReader->filter->andEqual($applicationReader->model->install, true);
        foreach ($applicationReader->getData() as $applicationRow) {

            $application = $applicationRow->getApplication();

            foreach ($application->getPackageList() as $package) {
                $packageList[$package->packageName] = $package;
            }

        }


        foreach ($packageList as $package) {

            $setup = new PackageSetup();
            $setup->destinationPath = $this->destinationPath;
            $setup->addPackage($package);

        }

    }

}