<?php

namespace Nemundo\Core\Image\Cropping;


use Nemundo\Core\Base\AbstractBase;

class ImageCropping extends AbstractBase
{

    /**
     * @var string
     */
    public $sourceFilename;

    /**
     * @var string
     */
    public $destinationFilename;

    /**
     * @var CroppingDimension
     */
    public $croppingDimension;


    public function __construct()
    {
        $this->croppingDimension = new CroppingDimension();
    }


    public function cropping()
    {

        $im = imagecreatefromjpeg($this->sourceFilename);
        //$size = min(imagesx($im), imagesy($im));
        $im2 = imagecrop($im, ['x' => $this->croppingDimension->x, 'y' => $this->croppingDimension->y, 'width' => $this->croppingDimension->width, 'height' => $this->croppingDimension->height]);
        if ($im2 !== FALSE) {
            imagejpeg($im2, $this->destinationFilename);
            imagedestroy($im2);
        }
        imagedestroy($im);


    }


}