<?php

namespace Nemundo\Db\Sql;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Field\AbstractField;
use Nemundo\Db\Sql\Field\ColumnField;
use Nemundo\Db\Sql\Field\WildcardField;
use Nemundo\Db\Sql\Join\SqlJoinTrait;
use Nemundo\Db\Sql\Order\SqlOrderTrait;
use Nemundo\Db\Sql\Parameter\SqlStatement;

class SelectQuery extends AbstractBaseClass
{

    use SqlJoinTrait;
    use SqlOrderTrait;

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

    private $groupList = [];

    /**
     * @var ColumnField[]
     */
    private $fieldList = [];

    /**
     * @var Filter
     */
    public $filter;

    /**
     * @var Filter
     */
    public $having;

    /**
     * @var bool
     */
    public $quoteTableName = true;

    public function __construct()
    {
        $this->filter = new Filter();
        $this->having = new Filter();
    }


    public function addField(AbstractField $field)
    {
        $this->fieldList[] = $field;
        return $this;
    }


    public function addGroup($fieldName)
    {
        $this->groupList[] = $fieldName;
        return $this;
    }


    public function getSqlParameter()
    {

        $sqlParameter = new SqlStatement();
        if (count($this->fieldList) == 0) {
            $this->addField(new WildcardField());
        }

        $fieldList = [];
        foreach ($this->fieldList as $fieldSql) {
            $fieldList[] = $fieldSql->getFieldName();
        }

        $quote = '';
        if ($this->quoteTableName) {
            $quote = '`';
        }

        $sql = 'SELECT ' . implode(',', $fieldList) . ' FROM ' . $quote . $this->tableName . $quote;

        if ($this->aliasTableName !== null) {
            $sql .= ' ' . $this->aliasTableName;
        }

        foreach ($this->joinList as $join) {
            $sql .= $join->getSql();
        }

        if ($this->filter->isNotEmpty()) {
            $sqlParameterList = $this->filter->getSqlStatement();
            $sql .= ' WHERE ' . $sqlParameterList->sql;
            $sqlParameter->addParameterList($sqlParameterList->getParameterList());
        }

        if (sizeof($this->groupList) > 0) {
            $sqlGroupBy = '';
            foreach ($this->groupList as $groupBy) {
                if ($sqlGroupBy !== '') {
                    $sqlGroupBy .= ',';
                }
                $sqlGroupBy .= $groupBy;
            }
            $sql .= ' GROUP BY ' . $sqlGroupBy;
        }

        if ($this->having->isNotEmpty()) {
            $sqlParameterList = $this->having->getSqlStatement();
            $sql .= ' HAVING ' . $sqlParameterList->sql;
            $sqlParameter->addParameterList($sqlParameterList->getParameterList());
        }

        $sql .= $this->getOrderSql();

        if ($this->limit !== null) {
            $sql .= ' LIMIT ' . $this->limitStart . ',' . $this->limit;
        }

        $sql .= ';';
        $sqlParameter->sql = $sql;

        return $sqlParameter;

    }

}