<?php

namespace Nemundo\App\Application\Script;

use Nemundo\App\Application\Copy\AppPackageCopy;
use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Com\Package\PackageSetup;
use Nemundo\Project\Path\ProjectPath;
use Nemundo\Project\Path\WebPath;
use Nemundo\Project\Web\WebCollection;

class PackageSetupScript extends AbstractConsoleScript
{
    protected function loadScript()
    {

        $this->scriptName = 'app-package';

    }

    public function run()
    {


        $copy=new AppPackageCopy();
        $copy->destinationPath = (new WebPath())->getPath();
        $copy->copyPackage();

        /*
        $copy->destinationPath = (new ProjectPath())
            ->addPath($webProject->webPath)
            ->getPath();*/



       /*
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


            foreach ((new WebCollection())->getWebProjectList() as $webProject) {

                $setup = new PackageSetup();
                $setup->destinationPath = (new ProjectPath())
                    ->addPath($webProject->webPath)
                    ->getPath();
                $setup->addPackage($package);

            }

        }*/

    }

}