<?php

namespace Nemundo\Db\Data;


use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Field\AbstractField;
use Nemundo\Db\Sql\Join\AbstractSqlJoin;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Db\Sql\UpdateQuery;

abstract class AbstractUpdate extends AbstractDataUpdate
{

    /**
     * @var Filter
     */
    public $filter;

    /**
     * @var int
     */
    public $limit;

    /**
     * @var UpdateQuery
     */
    private $updateQuery;


    function __construct()
    {

        parent::__construct();
        $this->filter = new Filter();
        $this->updateQuery = new UpdateQuery();

    }


    protected function setValue($fieldName, $value)
    {
        $this->updateQuery->setValue($fieldName, $value);
        return $this;
    }


    public function addJoin(AbstractSqlJoin $join)
    {
        $this->updateQuery->addJoin($join);
        return $this;
    }


    public function addOrder(AbstractField $field, $sortOrder = SortOrder::ASCENDING)
    {
        $this->updateQuery->addOrder($field, $sortOrder);
        return $this;
    }


    public function update()
    {

        if (!$this->checkProperty('tableName')) {
            return;
        }

        $this->updateQuery->tableName = $this->tableName;
        $this->updateQuery->filter = $this->filter;
        $this->updateQuery->limit = $this->limit;
        $this->connection->execute($this->updateQuery->getSqlParameter());

    }

}