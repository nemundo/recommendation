<?php

namespace Nemundo\Core\File;


use Nemundo\Core\Type\File\File;

class FileCompare
{

    private $fileList = array();

    /**
     * @param $filename
     */
    public function addFile($filename)
    {
        $this->fileList[] = $filename;
    }

    /**
     * @return bool
     */
    public function compareFile()
    {

        $returnValue = false;

        $hashList = array();

        foreach ($this->fileList as $filename) {
            $file = new File($filename);
            $hashList[] = $file->getHash();
        }

        $hashList = array_unique($hashList);

        if (sizeof($hashList) == 1) {
            $returnValue = true;
        }

        /*if ($hashList[0] == $hashList[1]) {
            $returnValue = true;
        }*/

        return $returnValue;

    }

}