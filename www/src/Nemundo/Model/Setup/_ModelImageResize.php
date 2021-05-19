<?php

namespace Nemundo\Model\Setup;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Image\Format\AutoSizeImageFormat;
use Nemundo\Core\Image\Format\FixHeightImageFormat;
use Nemundo\Core\Image\Format\FixWidthImageFormat;
use Nemundo\Core\Image\ImageResize;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Type\File\File;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Reader\ModelDataReader;
use Nemundo\Model\Reader\Property\File\ImageReaderProperty;
use Nemundo\Model\Type\File\ImageType;
use Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixHeightModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixWidthModelModelImageFormat;


class ModelImageResize extends AbstractBase
{

    /**
     * @var AbstractModel
     */
    public $model;


    public function resizeImage()
    {

        if (!$this->checkProperty('model')) {
            exit;
        }

        if (!$this->model->checkModel()) {
            exit;
        }


        foreach ($this->model->getTypeList() as $type) {

            if ($type->isObjectOfClass(ImageType::class)) {


                $reader = new ModelDataReader();
                $reader->model = $this->model;
                $reader->addFieldByModel($this->model);

                foreach ($reader->getData() as $row) {

                    $imageDataReader = new ImageReaderProperty($row, $type);

                    //(new Debug())->write($imageDataReader->getFullFilename());

                    foreach ($type->getFormatList() as $resizeFormat) {

                        $destinationFilename = (new Path())
                            ->addPath($type->getDataPath())
                            ->addPath($resizeFormat->getPath())
                            ->addPath(basename($imageDataReader->getFullFilename()))
                            ->getFilename();


                        if (!(new File($destinationFilename))->fileExists()) {


                            //$this->type->getDataPath() . $resizeFormat->getPath() . DIRECTORY_SEPARATOR . basename($uniqueFilename);

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

                            $imageResize = new ImageResize();
                            $imageResize->sourceFilename = $imageDataReader->getFullFilename();
                            $imageResize->destinationFilename = $destinationFilename;
                            $imageResize->format = $format;
                            $imageResize->resizeImage();

                        }

                    }


                }


                /*
                foreach ($type->getFormatList() as $format) {


                    (new Debug())->write($format->imageFormatLabel);





                }*/

            }

        }

    }

}