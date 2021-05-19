<?php

namespace Nemundo\Db\Sql\Field;


use Nemundo\Db\Reader\AbstractDataReader;

class CountField extends AbstractField
{


    public function __construct(AbstractDataReader $reader = null)
    {
        parent::__construct($reader);
        $this->aliasFieldName = 'count_field';
    }


    public function getFieldName()
    {
        $sql = 'COUNT(*) ' . $this->aliasFieldName;
        return $sql;
    }


    public function getConditionFieldName()
    {
        return $this->aliasFieldName;
    }

}