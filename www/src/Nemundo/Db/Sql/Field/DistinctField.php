<?php

namespace Nemundo\Db\Sql\Field;


use Nemundo\Db\Reader\AbstractDataReader;

class DistinctField extends AbstractField
{

    public $tableName;

    public function __construct(AbstractDataReader $reader = null)
    {
        parent::__construct($reader);
        $this->fieldName='id';
        $this->aliasFieldName = 'distinct_id';

    }


    public function getFieldName()
    {

        $sql = 'DISTINCT '.$this->tableName.'.`id` distinct_id';
        //$sql = 'DISTINCT '.$this->aliasFieldName.'.`id` distinct_id';
        return $sql;
    }


    public function getConditionFieldName()
    {
        return $this->aliasFieldName;
    }

}