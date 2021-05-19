<?php

namespace Nemundo\Core\Archive;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\File\DirectoryReader;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\Type\Text\Text;


class ZipArchive extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $archiveFilename;

    /**
     * @var ZipFileItem[]
     */
    private $fileItemList = [];


    public function addFilename($filename)
    {

        $item = new ZipFileItem();
        $item->orginalFilename = $filename;
        $item->internalFilename = (new File($filename))->filename;
        $this->fileItemList[] = $item;

        return $this;

    }


    public function addPath($path, $destinationPath = '')
    {

        $reader = new DirectoryReader();
        $reader->includeDirectories = true;
        $reader->includeFiles = true;
        $reader->recursiveSearch = true;
        $reader->path = $path;
        foreach ($reader->getData() as $file) {

            if ($file->isFile()) {

                $item = new ZipFileItem();
                $item->orginalFilename = $file->fullFilename;

                $tmpFilename = new Text($file->fullFilename);
                $tmpFilename->removeLeft($path);
                $item->internalFilename = $destinationPath . $tmpFilename->getValue();

                $this->fileItemList[] = $item;

            }

        }

    }


    public function createArchive()
    {

        if (!$this->checkProperty('archiveFilename')) {
            return;
        }

        $file = new File($this->archiveFilename);

        $path = new Path($file->getPath());
        $path->createPath();

        $this->createArchiveInternal($this->archiveFilename);


    }


    private function createArchiveInternal($zipFilename)
    {

        $zip = new \ZipArchive;

        if ($zip->open($zipFilename, \ZipArchive::CREATE) === TRUE) {

            foreach ($this->fileItemList as $fileItem) {
                $zip->addFile($fileItem->orginalFilename, $fileItem->internalFilename);
            }

            $zip->close();

        } else {
            (new LogMessage())->writeError('Failed to create Zip File');
        }

    }

}
