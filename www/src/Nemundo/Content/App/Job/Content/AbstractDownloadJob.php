<?php


namespace Nemundo\Content\App\Job\Content;


use Nemundo\Content\App\Job\Content\AbstractJobContentType;
use Nemundo\Core\File\UniqueFilename;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\WebRequest\CurlWebRequest;
use Nemundo\Core\WebRequest\WebRequest;
use Nemundo\Project\Path\TmpPath;


abstract class AbstractDownloadJob extends AbstractJobContentType
{


    protected $filename;

    protected function downloadUrl($url) {

        $this->filename = (new TmpPath())
            ->addPath((new UniqueFilename())->getUniqueFilename())
            ->getFullFilename();

        //(new WebRequest())->downloadUrl($url,$this->filename);
        (new CurlWebRequest())->downloadUrl($url,$this->filename);

        return $this->filename;

    }


    protected function getDownloadFilename() {

        return $this->filename;
    }


    protected function deleteFile() {

        (new File($this->filename))->deleteFile();


    }


}