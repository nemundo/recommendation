<?php

namespace Nemundo\Model\Type\ImageFormat;


class FixWidthModelModelImageFormat extends AbstractModelImageFormat
{

    /**
     * @var int
     */
    public $width;

    protected function loadImageFormat()
    {

        $this->imageFormatId = 'fa581ebd-7e3a-4653-b530-5708169d20ed';
        $this->imageFormatLabel = 'Fix Width';
        $this->imageFormatName = 'fix_width';

    }


    function getPath()
    {
        $path = 'w_' . $this->width;
        return $path;
    }

}