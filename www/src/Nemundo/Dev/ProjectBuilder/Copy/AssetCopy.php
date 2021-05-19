<?php

namespace Nemundo\Dev\ProjectBuilder\Copy;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\FileCopy;
use Nemundo\Core\Path\Path;
use Nemundo\FrameworkProject;

class AssetCopy extends AbstractBase
{

    public $destinationPath;

    public function copyAsset($filename, $path = null)
    {

        $copy = new FileCopy();
        $copy->sourceFilename = (new Path())
            ->addPath((new FrameworkProject())->path)
            ->addPath('..')
            ->addPath('package')
            ->addPath('project_builder')
            ->addPath($filename)
            ->getFilename();

        $destinationFilename = (new Path($this->destinationPath))
            ->createPath();

        if ($path !== null) {
            $destinationFilename->addPath($path);
        }

        $destinationFilename->addPath($filename);

        $copy->destinationFilename = $destinationFilename->getFilename();
        $copy->copyFile();

        return $this;

    }

}