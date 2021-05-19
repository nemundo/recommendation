<?php

namespace Nemundo\Model\Type\ImageFormat;


class AutoSizeModelImageFormat extends AbstractModelImageFormat
{

    /**
     * @var int
     */
    //public $size;

    protected function loadImageFormat()
    {
        $this->imageFormatId = '6a4e7332-28e1-43e0-bf1b-26581c74bfd2';
        $this->imageFormatLabel = 'Auto Size';
        $this->imageFormatName = 'auto_size';
    }


    function getPath()
    {
        $path = 'auto_' . $this->size;
        return $path;
    }

}