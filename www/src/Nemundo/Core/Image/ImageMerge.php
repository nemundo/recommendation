<?php

namespace Nemundo\Core\Image;


use Nemundo\Core\Base\AbstractBaseClass;

class ImageMerge extends AbstractBaseClass
{


    private $imageList = [];


    public function addImage($filename)
    {
        $this->imageList[] = $filename;
        return $this;
    }


    public function mergeImage($filename)
    {

        $img = new \Nemundo\Core\Image\ImageFile($this->imageList[0]);
        $baseImage = imagecreatetruecolor($img->width, $img->height);

        $white = imagecolorallocate($baseImage, 255, 255, 255);
        imagefill($baseImage, 0, 0, $white);

        $pct = 100 / sizeof($this->imageList);
        foreach ($this->imageList as $image) {
            $src = imagecreatefromjpeg($image);
            imagecopymerge($baseImage, $src, 0, 0, 0, 0, $img->width, $img->height, $pct);
        }

        imagejpeg($baseImage, $filename);

    }

}