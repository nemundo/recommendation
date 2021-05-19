<?php

namespace Nemundo\Db\Value;

use Nemundo\Db\Filter\Filter;

class DataValue extends AbstractDataValue
{

    /**
     * @var string
     */
    public $tableName;

    /**
     * @var string
     */
    public $fieldName;

    /**
     * @var Filter
     */
    public $filter;

}