<?php

namespace Nemundo\Orm\Code;




use Nemundo\Model\Data\AbstractModelData;


class DataOrmCode extends AbstractDataOrmCode
{


    public function createClass()
    {

        $this->dataClassName = $this->model->className;
        $this->dataExtendsClass = AbstractModelData::class;

        //$phpClass->className = $this->dataClassName;  // $this->model->className;
        //$phpClass->extendsFromClass = $this->prefixClassName(AbstractModelData::class);
        //$phpClass->extendsFromClass = $this->prefixClassName($this->dataExtendsClass);



        parent::createClass();


    }

}
