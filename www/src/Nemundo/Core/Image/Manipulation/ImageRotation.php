<?php

namespace Nemundo\Core\Image\Manipulation;


use Nemundo\Core\Image\Exif\Exif;

class ImageRotation extends AbstractImageManipulation
{

    public function rotateImage($degree = 0)
    {

        if (($degree !== 0) && ($this->destinationFilename == null)) {

            $imageSource = $this->getImageSource();
            $rotate = imagerotate($imageSource, $degree, 0);

            $this->saveImageSource($rotate);

            imagedestroy($imageSource);
            imagedestroy($rotate);

        }

    }


    public function autoRotateImage()
    {

        $exif = new Exif($this->sourceFilename);

        $degree = 0;
        switch ($exif->orientation) {

            case 1:
                $degree = 0;
                break;

            case 3:
                $degree = 180;
                break;

            case 6:
                $degree = 270;
                break;

            case 8:
                $degree = 90;
                break;

        }

        $this->rotateImage($degree);

    }

}