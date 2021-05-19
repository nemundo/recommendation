<?php


namespace Nemundo\Com\Package;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\DirectoryCopy;
use Nemundo\Core\Path\Path;
use Nemundo\FrameworkProject;

class PackageCopy extends AbstractBase
{


    public function copyPackage(AbstractPackage $package, $destinationPath) {


        if ($package->project == null) {
            $package->project = new FrameworkProject();
        }

        $sourcePath = (new Path())
            ->addPath($package->project->path)
            ->addPath('..')
            ->addPath('package')
            ->addPath($package->packageName)
            ->getPath();

        /*$destinationPath = (new Path())
            ->addPath($this->destinationPath)
            ->addPath('asset')
            ->addPath($package->packageName)
            ->getPath();*/

        $copy = new DirectoryCopy();
        $copy->overwriteExistingFile = true;
        $copy->sourcePath = $sourcePath;
        $copy->destinationPath = $destinationPath;
        $copy->copyDirectory();

        return $this;

    }

}