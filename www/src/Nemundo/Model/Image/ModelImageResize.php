<?php


namespace Nemundo\Model\Image;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Model\Data\Property\Image\DataImageResize;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Reader\ModelDataReader;
use Nemundo\Model\Reader\Property\File\ImageReaderProperty;
use Nemundo\Model\Type\File\ImageType;


class ModelImageResize extends AbstractBase
{

    public function resizeModel(AbstractModel $model)
    {

        $reader = new ModelDataReader();
        $reader->model = $model;
        foreach ($reader->getData() as $dataRow) {

            foreach ($model->getTypeList() as $type) {

                if ($type->isObjectOfClass(ImageType::class)) {

                    $image = new ImageReaderProperty($dataRow, $type);
                    $filenameOrginal = $image->getFullFilename();

                    $resize = new DataImageResize();
                    $resize->type = $type;
                    $resize->resizeImage($filenameOrginal);

                }

            }

        }

    }

}