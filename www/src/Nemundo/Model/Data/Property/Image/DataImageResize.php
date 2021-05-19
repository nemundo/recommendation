<?php


namespace Nemundo\Model\Data\Property\Image;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\FileCopy;
use Nemundo\Core\Image\Format\AutoSizeImageFormat;
use Nemundo\Core\Image\Format\FixHeightImageFormat;
use Nemundo\Core\Image\Format\FixWidthImageFormat;
use Nemundo\Core\Image\ImageFile;
use Nemundo\Core\Image\ImageResize;
use Nemundo\Core\Image\Manipulation\ImageRotation;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Type\File\File;
use Nemundo\Model\Type\File\ImageType;
use Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixHeightModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixWidthModelModelImageFormat;

class DataImageResize extends AbstractBase
{

    /**
     * @var ImageType
     */
    public $type;


    /*
    public function fromFilename($filename)
    {
        $fullFilename = parent::fromFilename($filename);
        $this->resizeImage($fullFilename);
    }


    public function fromUrl($url, $filenameExtension = null)
    {
        $fullFilename = parent::fromUrl($url, $filenameExtension);
        $this->resizeImage($fullFilename);
    }


    public function fromFileRequest(AbstractFileRequest $fileRequest)
    {
        $fullFilename = parent::fromFileRequest($fileRequest);
        $this->resizeImage($fullFilename);
    }*/


    public function resizeImage($uniqueFilename)
    {

        $imageRotation = new ImageRotation($uniqueFilename);
        $imageRotation->autoRotateImage();

        foreach ($this->type->getFormatList() as $resizeFormat) {

            $destinationFilename = (new Path())
                ->addPath($this->type->getDataPath())
                ->addPath($resizeFormat->getPath())
                ->addPath(basename($uniqueFilename))
                ->getFilename();

            $file = new File($destinationFilename);

            if ($file->notExists()) {

                $format = null;

                if ($resizeFormat->isObjectOfClass(AutoSizeModelImageFormat::class)) {
                    $format = new AutoSizeImageFormat();
                    $format->size = $resizeFormat->size;
                }

                if ($resizeFormat->isObjectOfClass(FixWidthModelModelImageFormat::class)) {
                    $format = new FixWidthImageFormat();
                    $format->width = $resizeFormat->width;
                }

                if ($resizeFormat->isObjectOfClass(FixHeightModelImageFormat::class)) {
                    $format = new FixHeightImageFormat();
                    $format->height = $resizeFormat->height;
                }


                $image = new ImageFile($uniqueFilename);
                switch ($image->imageType) {

                    case 'jpg':
                    case 'jpeg':
                    case 'png':
                    case 'gif':
                        $imageResize = new ImageResize();
                        $imageResize->sourceFilename = $uniqueFilename;
                        $imageResize->destinationFilename = $destinationFilename;
                        $imageResize->format = $format;
                        $imageResize->resizeImage();
                        break;

                    default:

                        $copy = new FileCopy();
                        $copy->sourceFilename = $uniqueFilename;
                        $copy->destinationFilename = $destinationFilename;
                        $copy->copyFile();

                        break;

                }

            }

        }

    }


}