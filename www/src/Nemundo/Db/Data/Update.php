<?php

namespace Nemundo\Db\Data;


use Nemundo\Db\Filter\Filter;

class Update extends AbstractUpdate
{

    /**
     * @var string
     */
    public $tableName;

    /**
     * @var Filter
     */
    public $filter;


    public function setValue($fieldName, $value)
    {
        return parent::setValue($fieldName, $value);
    }

}