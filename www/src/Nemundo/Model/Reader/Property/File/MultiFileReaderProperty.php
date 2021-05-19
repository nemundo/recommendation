<?php

namespace Nemundo\Model\Reader\Property\File;


use Nemundo\Model\Definition\Model\MultiFileModel;
use Nemundo\Model\Reader\ModelDataReader;
use Nemundo\Model\Reader\Property\AbstractReaderProperty;
use Nemundo\Model\Type\File\MultiFileType;

class MultiFileReaderProperty extends AbstractReaderProperty
{

    /**
     * @var MultiFileType
     */
    protected $type;

    /**
     * @return FileReaderProperty[]
     */
    public function getList()
    {

        /** @var MultiFileModel $model */
        $model = $this->type->getExternalModel();

        $reader = new ModelDataReader();
        $reader->model = $model;
        $reader->filter->andEqual($model->externalId, $this->modelRow->getModelValue($this->modelRow->model->id));

        $list = [];
        foreach ($reader->getData() as $row) {

            /** @var MultiFileModel $model */
            $model = $this->type->getExternalModel();

            $filePorperty = new FileReaderProperty($row, $model->file);
            $list[] = $filePorperty;
        }

        return $list;

    }

}