<?php

namespace Nemundo\Db\Delete;


use Nemundo\Db\Filter\Filter;

class DataDelete extends AbstractDataDelete
{

    /**
     * @var string
     */
    public $tableName;

    /**
     * @var Filter
     */
    public $filter;

}