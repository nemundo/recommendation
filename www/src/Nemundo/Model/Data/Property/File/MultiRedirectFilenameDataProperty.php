<?php

namespace Nemundo\Model\Data\Property\File;


use Nemundo\Model\Data\ModelData;
use Nemundo\Model\Type\File\MultiRedirectFilenameType;

class MultiRedirectFilenameDataProperty extends AbstractMultiFileDataProperty
{

    /**
     * @var MultiRedirectFilenameType
     */
    protected $type;


    public function saveData($id)
    {

        $model = $this->type->getExternalModel();

        foreach ($this->filenameList as $filename) {

            $data = new ModelData();
            $data->model = $model;
            $fileProperty = new FileDataProperty($model->file, $data->typeValueList);
            $fileProperty->fromFilename($filename);
            $data->typeValueList->setModelValue($model->externalId, $id);
            $data->save();

        }


        foreach ($this->urlList as $url) {

            $data = new ModelData();
            $data->model = $model;
            $fileProperty = new FileDataProperty($model->file, $data->typeValueList);
            $fileProperty->fromUrl($url, $this->defaultFileExtension);
            $data->typeValueList->setModelValue($model->externalId, $id);
            $data->save();
        }


        foreach ($this->fileRequestList as $fileRequest) {

            $data = new ModelData();
            $data->model = $model;
            $fileProperty = new RedirectFilenameDataProperty($model->file, $data->typeValueList);
            $fileProperty->fromFileRequest($fileRequest);
            $data->typeValueList->setModelValue($model->externalId, $id);
            $data->save();

        }

    }

}