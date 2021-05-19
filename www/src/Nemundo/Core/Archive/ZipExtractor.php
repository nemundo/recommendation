<?php

namespace Nemundo\Core\Archive;


use Nemundo\Core\Debug\Debug;
use Nemundo\Core\File\FileUtility;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Type\File\File;

class ZipExtractor extends AbstractExtractor
{

    public function extract()
    {

        if (!$this->checkProperty(['archiveFilename', 'extractPath'])) {
            return;
        }


        if (!(new File($this->archiveFilename))->fileExists()) {
            (new LogMessage())->writeError('Zip Filename does not exist. Filename: ' . $this->archiveFilename);
            return;
        }


        $this->extractPath = (new FileUtility())->appendDirectorySeparatorIfNotExists($this->extractPath);

        (new Path($this->extractPath))
            ->createPath();


        $zip = new \ZipArchive();
        if ($zip->open($this->archiveFilename) === TRUE) {
            $zip->extractTo($this->extractPath);
            $zip->close();
        } else {
            (new LogMessage())->writeError('Zip Extract Error');
            (new Debug())->write( $zip->getStatusString());
        }


    }

}