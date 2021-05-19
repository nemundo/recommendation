<?php

namespace Nemundo\Core\File;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Type\Text\Text;

class DirectoryCopy extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $sourcePath;

    /**
     * @var string
     */
    public $destinationPath;

    /**
     * @var bool
     */
    public $overwriteExistingFile = false;


    public function copyDirectory()
    {

        $this->sourcePath = (new FileUtility())->appendDirectorySeparatorIfNotExists($this->sourcePath);
        $this->destinationPath = (new FileUtility())->appendDirectorySeparatorIfNotExists($this->destinationPath);

        $directoryReader = new DirectoryReader();
        $directoryReader->path = $this->sourcePath;
        $directoryReader->recursiveSearch = true;

        foreach ($directoryReader->getData() as $file) {

            if ($file->isFile()) {
                $fileCopy = new FileCopy();
                $fileCopy->overwriteExistingFile = $this->overwriteExistingFile;
                $fileCopy->sourceFilename = $file->fullFilename;

                $path = new Text($file->path);
                $path->removeLeft($this->sourcePath);

                $fileCopy->destinationFilename = $this->destinationPath . $path->getValue() . $file->filename;
                $fileCopy->copyFile();

            }

        }

    }

}