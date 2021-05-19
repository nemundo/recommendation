<?php

namespace Nemundo\Core\Image\Manipulation;


use Nemundo\Core\Image\AbstractImage;
use Nemundo\Core\Log\LogMessage;

class AbstractImageManipulation extends AbstractImage
{

    /**
     * @var string
     */
    public $destinationFilename;

    /**
     * @var int
     */
    protected $imageType;

    protected function getImageSource()
    {

        $this->imageType = exif_imagetype($this->sourceFilename);

        $imageSource = null;

        switch ($this->imageType) {

            case IMAGETYPE_JPEG:
                $imageSource = imagecreatefromjpeg($this->sourceFilename);
                break;

            case IMAGETYPE_PNG:
                $imageSource = imagecreatefrompng($this->sourceFilename);
                break;

            case IMAGETYPE_GIF:
                $imageSource = imagecreatefromgif($this->sourceFilename);
                break;

            default:
                (new LogMessage())->writeError('No valid File Extension. Filename: ' . $this->sourceFilename);
                break;

        }

        return $imageSource;

    }


    protected function saveImageSource($imageSource)
    {

        $imageFilename = $this->sourceFilename;
        if ($this->destinationFilename !== null) {
            $imageFilename = $this->destinationFilename;
        }


        switch ($this->imageType) {

            case IMAGETYPE_JPEG:
                imagejpeg($imageSource, $imageFilename);
                break;

            case IMAGETYPE_PNG:
                imagepng($imageSource, $imageFilename);
                break;

            case IMAGETYPE_GIF:
                imagegif($imageSource, $imageFilename);
                break;

            default:
                (new LogMessage())->writeError('No valid File Extension. Filename: ' . $this->sourceFilename);
                break;

        }

    }

}