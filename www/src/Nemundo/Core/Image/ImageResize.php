<?php

namespace Nemundo\Core\Image;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Image\Format\AbstractImageFormat;
use Nemundo\Core\Image\Format\AutoSizeImageFormat;
use Nemundo\Core\Image\Format\FixHeightImageFormat;
use Nemundo\Core\Image\Format\FixWidthImageFormat;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;


class ImageResize extends AbstractBaseClass
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
     * @var AbstractImageFormat|FixWidthImageFormat|FixHeightImageFormat|AutoSizeImageFormat
     */
    public $format;

    /**
     * @var int
     */
    public $jpegQuality = 100;


    public function resizeImage()
    {

        if (!$this->checkProperty(array('sourceFilename', 'destinationFilename'))) {
            return;
        }

        if (!$this->checkObject('format', $this->format, AbstractImageFormat::class)) {
            exit;
        }

        $sourceFile = new File($this->sourceFilename);
        if (!$sourceFile->fileExists()) {
            (new LogMessage())->writeError('Image Resize: File ' . $this->sourceFilename . ' does not exist.');
            return;
        }

        $image = new ImageFile($this->sourceFilename);
        if ($image->width == 0 || $image->height == 0) {
            (new LogMessage())->writeError('Width Image Dimension is 0');
        }

        $fileExtension = $image->imageType;
        //(new Debug())->write('extension'.$fileExtension);
        switch ($fileExtension) {

            case 'jpg':
            case 'jpeg':
                $imageSource = \imagecreatefromjpeg($this->sourceFilename);
                break;

            case 'png':
                $imageSource = \imagecreatefrompng($this->sourceFilename);
                break;

            case 'gif':
                $imageSource = \imagecreatefromgif($this->sourceFilename);
                break;

            default:
                (new LogMessage())->writeError('No valid File Extension. Filename: ' . $this->sourceFilename);
                return;
                break;

        }

        $destinationWidth = 0;
        $destinationHeight = 0;

        $sourceWidth = \imageSX($imageSource);
        $sourceHeight = \imageSY($imageSource);

        switch ($this->format->getClassName()) {

            case AutoSizeImageFormat::class:
                if ($sourceWidth >= $sourceHeight) {
                    $destinationWidth = $this->format->size;
                    $destinationHeight = $this->format->size * ($sourceHeight / $sourceWidth);
                }

                if ($sourceWidth < $sourceHeight) {
                    $destinationHeight = $this->format->size;
                    $destinationWidth = $this->format->size * ($sourceWidth / $sourceHeight);
                }
                break;

            case FixWidthImageFormat::class:
                $destinationWidth = $this->format->width;
                $destinationHeight = $this->format->width * ($sourceHeight / $sourceWidth);
                break;

            case FixHeightImageFormat::class:
                $destinationHeight = $this->format->height;
                $destinationWidth = $this->format->height * ($sourceWidth / $sourceHeight);
                break;
        }

        $imageDestination = \imagecreatetruecolor($destinationWidth, $destinationHeight);

        \imagealphablending($imageDestination, false);
        \imagesavealpha($imageDestination, true);

        $transparent = \imagecolorallocatealpha($imageDestination, 255, 255, 255, 127);
        \imagefilledrectangle($imageDestination, 0, 0, $destinationWidth, $destinationHeight, $transparent);
        \imagecopyresampled($imageDestination, $imageSource, 0, 0, 0, 0, $destinationWidth, $destinationHeight, $sourceWidth, $sourceHeight);


        /*
         * problem ???
        if (!\is_resource($imageDestination)) {
            (new Debug())->write('No Resource. Filename: ' . $this->sourceFilename);
            //exit;
        }*/

        if (\preg_match('/jpg|jpeg/', $fileExtension)) {
            \imagejpeg($imageDestination, $this->destinationFilename, $this->jpegQuality);
        }

        if (\preg_match('/png/', $fileExtension)) {
            \imagepng($imageDestination, $this->destinationFilename);
        }

        if (\preg_match('/gif/', $fileExtension)) {
            \imagegif($imageDestination, $this->destinationFilename);
        }

        \imagedestroy($imageDestination);
        \imagedestroy($imageSource);

    }

}
