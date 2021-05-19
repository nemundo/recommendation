<?php

namespace Nemundo\Db\Value;


use Nemundo\Db\Base\AbstractDbBase;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Field\AbstractField;
use Nemundo\Db\Sql\Field\Aggregate\MaxField;
use Nemundo\Db\Sql\Field\Aggregate\MinField;
use Nemundo\Db\Sql\Field\Aggregate\SumField;
use Nemundo\Db\Sql\Join\AbstractSqlJoin;
use Nemundo\Db\Sql\Order\SqlOrderTrait;
use Nemundo\Db\Sql\SelectQuery;


abstract class AbstractDataValue extends AbstractDbBase
{

    use SqlOrderTrait;

    /**
     * @var string
     */
    protected $tableName;

    /**
     * @var AbstractField
     */
    public $field;

    /**
     * @var SelectQuery
     */
    protected $select;

    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var AbstractSqlJoin[]
     */
    private $joinList = [];

    public function __construct()
    {
        parent::__construct();
        $this->select = new SelectQuery();
        $this->filter = new Filter();
    }


    public function addJoin(AbstractSqlJoin $join)
    {

        $this->joinList[] = $join;
        return $this;
    }


    public function getValue()
    {



        if (!$this->checkProperty('tableName')) {
            return null;
        }

        $this->select->tableName = $this->tableName;
        $this->select->addField($this->field);
        $this->select->filter = $this->filter;
        $this->select->limit = 1;

        foreach ($this->joinList as $join) {
            $this->select->addJoin($join);
        }

        foreach ($this->orderList as $order) {
            $this->select->addOrder($order->field, $order->sortOrder);
        }

        $value = $this->connection->queryValue($this->select->getSqlParameter());

        return $value;


    }


    public function getMinValue()
    {

        $field = new MinField();
        $field->aggregateField = $this->field;

        //$query = new SelectQuery();
        $this->select->addField($field);
        $this->select->tableName = $this->tableName;
        $this->select->filter = $this->filter;

        foreach ($this->joinList as $join) {
            $this->select->addJoin($join);
        }

        $value = $this->connection->queryValue($this->select->getSqlParameter());

        return $value;
    }


    // field als parameter ???
    public function getMaxValue()
    {

        $field = new MaxField();
        $field->aggregateField = $this->field;

        $this->select->addField($field);
        $this->select->tableName = $this->tableName;
        $this->select->filter = $this->filter;

        foreach ($this->joinList as $join) {
            $this->select->addJoin($join);
        }

        $value = $this->connection->queryValue($this->select->getSqlParameter());

        return $value;

    }


    public function getSumValue()
    {

        $field = new SumField();
        $field->aggregateField = $this->field;

        $query = new SelectQuery();
        $query->addField($field);
        $query->tableName = $this->tableName;
        $query->filter = $this->filter;

        foreach ($this->joinList as $join) {
            $this->select->addJoin($join);
        }

        $value = $this->connection->queryValue($query->getSqlParameter());

        return $value;

    }


    private function createQuery() {



    }


}