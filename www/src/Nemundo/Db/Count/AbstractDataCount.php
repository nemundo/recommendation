<?php

namespace Nemundo\Db\Count;


use Nemundo\Db\Base\AbstractDbBase;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Field\AbstractField;
use Nemundo\Db\Sql\Field\CountField;
use Nemundo\Db\Sql\Join\AbstractSqlJoin;
use Nemundo\Db\Sql\SelectQuery;

abstract class AbstractDataCount extends AbstractDbBase
{

    /**
     * @var string
     */
    public $tableName;

    /**
     * @var Filter
     */
    public $filter;

    /**
     * @var SelectQuery
     */
    protected $select;


    public function __construct()
    {
        parent::__construct();
        $this->filter = new Filter();
        $this->select = new SelectQuery();
    }


    public function addJoin(AbstractSqlJoin $join)
    {
        $this->select->addJoin($join);
        return $this;
    }


    // in external GroupByTrait
    protected function addGroupByFieldName($fieldName)
    {
        $this->select->addGroup($fieldName);
        return $this;
    }


    public function addGroup(AbstractField $field)
    {

        $fieldName = $field->getConditionFieldName();
        $this->addGroupByFieldName($fieldName);

    }


    public function getCount()
    {
        $this->select->addField(new CountField());
        $this->select->tableName = $this->tableName;
        $this->select->filter = $this->filter;
        $count = (int)$this->connection->queryValue($this->select->getSqlParameter());
        return $count;
    }

}