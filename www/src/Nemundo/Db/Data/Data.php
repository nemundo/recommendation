<?php

namespace Nemundo\Db\Data;


class Data extends AbstractData
{

    /**
     * @var string
     */
    public $tableName;

    public function setValue($fieldName, $value)
    {
        return parent::setValue($fieldName, $value);
    }


}