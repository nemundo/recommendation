<?php

namespace Nemundo\Model\Type\ImageFormat;


class FixHeightModelImageFormat extends AbstractModelImageFormat
{

    public $height;

    protected function loadImageFormat()
    {

        $this->imageFormatId = 'be08d969-a996-48fe-bc84-77f360da93b2';
        $this->imageFormatLabel = 'Fix Height';
        $this->imageFormatName = 'fix_height';

    }


    function getPath()
    {

        $path = 'h_' . $this->height;
        return $path;

    }

}