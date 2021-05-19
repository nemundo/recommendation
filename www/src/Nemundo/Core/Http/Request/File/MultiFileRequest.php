<?php

namespace Nemundo\Core\Http\Request\File;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\File\FileInformation;


// FileRequestList
class MultiFileRequest extends AbstractBaseClass
{

    /**
     * @var string
     */
    private $name;


    public function __construct($name)
    {
        $this->name = $name;
    }


    /**
     * @return FileRequest[]
     */
    public function getFileRequestList()
    {

        $fileRequestList = [];

        if (isset($_FILES[$this->name])) {
            $count = sizeof($_FILES[$this->name]['name']);

            for ($n = 0; $n < $count; $n++) {

                if ($_FILES[$this->name]['name'][$n] !== '') {

                    $fileUpload = new FileRequest();
                    $fileUpload->filename = $_FILES[$this->name]['name'][$n];
                    $fileUpload->tmpFileName = $_FILES[$this->name]['tmp_name'][$n];
                    $fileUpload->fileSize = $_FILES[$this->name]['size'][$n];
                    $fileUpload->errorCode = $_FILES[$this->name]['error'][$n];

                    $file = new FileInformation($fileUpload->filename);
                    $fileUpload->filenameExtension = $file->getFileExtension();

                    $fileRequestList[] = $fileUpload;
                }

            }

        }

        return $fileRequestList;

    }

}