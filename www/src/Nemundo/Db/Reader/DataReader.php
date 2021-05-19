<?php

namespace Nemundo\Db\Reader;

use Nemundo\Db\Sql\Field\AbstractField;
use Nemundo\Db\Sql\Join\AbstractSqlJoin;


class DataReader extends AbstractDataReader
{

    /**
     * @var string
     */
    public $tableName;

    /**
     * @var string
     */
    public $aliasTableName;

    /**
     * @var int
     */
    public $limitStart = 0;

    /**
     * @var int
     */
    public $limit;

    public function addField(AbstractField $field)
    {
        return parent::addField($field);
    }


    public function addJoin(AbstractSqlJoin $join)
    {
        return parent::addJoin($join);
    }


}