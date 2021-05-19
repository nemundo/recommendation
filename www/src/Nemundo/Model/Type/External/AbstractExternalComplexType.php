<?php

namespace Nemundo\Model\Type\External;


use Nemundo\Model\Definition\Model\TypeListTrait;
use Nemundo\Model\Type\AbstractModelType;

abstract class AbstractExternalComplexType extends AbstractModelType
{

    use TypeListTrait;

    abstract public function getExternalModel();


    /*
        public function getExternalModel()
        {

            $model = new MultiFileModel();
            $model->tableName = $this->tableName . '_' . $this->fieldName . '_multi_file';

            return $model;

        }
    */

}