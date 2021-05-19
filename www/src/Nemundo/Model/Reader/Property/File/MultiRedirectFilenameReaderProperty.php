<?php

namespace Nemundo\Model\Reader\Property\File;


use Nemundo\Model\Definition\Model\MultiRedirectFilenameModel;
use Nemundo\Model\Reader\ModelDataReader;
use Nemundo\Model\Reader\Property\AbstractReaderProperty;
use Nemundo\Model\Type\File\MultiRedirectFilenameType;

class MultiRedirectFilenameReaderProperty extends AbstractReaderProperty
{

    /**
     * @var MultiRedirectFilenameType
     */
    protected $type;


    // getFileList

    /**
     * @return RedirectFilenameReaderProperty[]
     */
    public function getList()
    {

        /** @var MultiRedirectFilenameModel $model */
        $model = $this->type->getExternalModel();

        $reader = new ModelDataReader();
        $reader->model = $model;
        $reader->filter->andEqual($model->externalId, $this->modelRow->getModelValue($this->modelRow->model->id));

        $model->file->redirectSite = $this->type->redirectSite;

        $list = [];
        foreach ($reader->getData() as $row) {
            $filePorperty = new RedirectFilenameReaderProperty($row, $model->file);
            $list[] = $filePorperty;
        }

        return $list;

    }

}