<?php

namespace Nemundo\Core\File;

class FileInformation extends AbstractFile  // AbstractBase
{


    /*
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }*/


    public function getFileExtension()
    {

        $filename = strtolower($this->filename);
        $extensionList = explode('.', $filename);
        $pointCount = count($extensionList) - 1;
        $extension = $extensionList[$pointCount];

        return $extension;

    }


    public function isImage()
    {

        $value = false;

        switch ($this->getFileExtension()) {

            case 'jpeg':
            case 'jpg':
            case 'png':
            case 'gif':
            case 'webp':
            case 'svg':
                $value = true;
                break;

        }

        return $value;

    }


    public function isAudio()
    {

        $value = false;

        switch ($this->getFileExtension()) {

            case 'mp3':
            case 'ogg':
                $value = true;
                break;

        }


        return $value;


    }


    public function isVideo()
    {

        $value = false;

        switch ($this->getFileExtension()) {

            case 'mpeg':
            case 'mp4':
                $value = true;
                break;

        }


        return $value;


    }


    public function isPdf()
    {

        $value = false;

        if ($this->getFileExtension() == 'pdf') {
            $value = true;
        }

        return $value;

    }


    public function isExcel()
    {

        $value = false;

        if ($this->getFileExtension() == 'xls') {
            $value = true;
        }

        return $value;

    }


    public function isWord()
    {

        $value = false;

        if ($this->getFileExtension() == 'docx') {
            $value = true;
        }

        return $value;

    }


    public function isText()
    {

        $value = false;

        if ($this->getFileExtension() == 'txt') {
            $value = true;
        }

        return $value;

    }


}