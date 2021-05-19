<?php

namespace Nemundo\Db\Reader;


use Nemundo\Core\Log\LogMessage;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Row\DataRow;
use Nemundo\Db\Sql\Field\AbstractField;
use Nemundo\Db\Sql\Field\ColumnField;
use Nemundo\Db\Sql\Join\AbstractSqlJoin;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Db\Sql\SelectQuery;


abstract class AbstractDataReader extends AbstractSqlReader
{

    /**
     * @var string
     */
    protected $tableName;

    /**
     * @var string
     */
    protected $aliasTableName;

    /**
     * @var int
     */
    protected $limitStart = 0;

    /**
     * @var int
     */
    protected $limit;

    /**
     * @var Filter
     */
    public $filter;

    /**
     * @var Filter
     */
    public $having;

    /**
     * @var SelectQuery
     */
    protected $select;

    /**
     * @var AbstractSqlJoin[]
     */
    private $joinList = [];

    public function __construct()
    {
        parent::__construct();
        $this->select = new SelectQuery();
        $this->filter = new Filter();
        $this->having = new Filter();
    }

// addColumn
    public function addField(AbstractField $field)
    {
        $this->select->addField($field);
        return $this;
    }


    public function addJoin(AbstractSqlJoin $join)
    {

        $this->joinList[] = $join;
        return $this;
    }

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


    public function addOrder(AbstractField $field, $sortOrder = SortOrder::ASCENDING)
    {

        $this->select->addOrder($field, $sortOrder);
        return $this;

    }


    public function addRandomOrder()
    {

        $col = new ColumnField();
        $this->addOrder($col, SortOrder::RANDOM);
        return $this;
    }


    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }


    /**
     * @return DataRow[]
     */
    public function getData()
    {

        $this->prepareData();
        $this->sqlStatement = $this->select->getSqlParameter();

        return parent::getData();

    }


    public function getRow()
    {

        $this->prepareData();
        $data = $this->connection->queryRow($this->select->getSqlParameter());

        $row = new DataRow($data);

        if (sizeof($data) == 0) {
            (new LogMessage())->writeError('GetRow: No returning Data. Table Name: ' . $this->tableName);
        }

        return $row;

    }


    private function prepareData()
    {

        $this->select->tableName = $this->tableName;
        $this->select->aliasTableName = $this->aliasTableName;
        $this->select->limitStart = $this->limitStart;
        $this->select->limit = $this->limit;
        $this->select->filter = $this->filter;
        $this->select->having = $this->having;

        foreach ($this->joinList as $join) {
            $this->select->addJoin($join);
        }


    }

}