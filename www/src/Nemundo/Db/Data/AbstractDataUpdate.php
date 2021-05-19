<?php

namespace Nemundo\Db\Data;


use Nemundo\Db\Base\AbstractDbBase;


abstract class AbstractDataUpdate extends AbstractDbBase
{

    /**
     * @var string
     */
    protected $tableName;

    abstract protected function setValue($fieldName, $value);

}