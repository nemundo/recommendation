<?php

namespace Nemundo\Db\Data;


class DataBulk extends AbstractDataBulk
{

    /**
     * @var string
     */
    public $tableName;


    public function setValue($fieldName, $value)
    {
        parent::setValue($fieldName, $value);
    }

}