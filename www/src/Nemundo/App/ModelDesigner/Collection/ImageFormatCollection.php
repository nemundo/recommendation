<?php

namespace Nemundo\App\ModelDesigner\Collection;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Model\Type\ImageFormat\AbstractModelImageFormat;
use Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixHeightModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixWidthModelModelImageFormat;

class ImageFormatCollection extends AbstractBase
{

    public function getImageFormatCollection()
    {

        /** @var AbstractModelImageFormat[]|FixWidthModelModelImageFormat[]|FixHeightModelImageFormat[] $list */
        $list = [];
        $list[] = new AutoSizeModelImageFormat();
        $list[] = new FixWidthModelModelImageFormat();
        $list[] = new FixHeightModelImageFormat();

        return $list;

    }


    public function getImageFormat($imageFormatName)
    {

        $value = null;
        foreach ($this->getImageFormatCollection() as $imageFormat) {
            if ($imageFormat->imageFormatName == $imageFormatName) {
                $value = $imageFormat;
            }
        }
        return $value;

    }

}