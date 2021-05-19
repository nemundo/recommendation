<?php

namespace Nemundo\Orm\Code;


use Nemundo\Model\Data\AbstractModelDataBulk;

class DataBulkOrmCode extends AbstractDataOrmCode  // DataOrmCode
{


    public function createClass()
    {

        $this->dataClassName = $this->model->className . 'Bulk';
        $this->dataExtendsClass = AbstractModelDataBulk::class;

        parent::createClass();

    }

}
