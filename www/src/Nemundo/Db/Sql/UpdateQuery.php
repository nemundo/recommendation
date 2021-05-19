<?php

namespace Nemundo\Db\Sql;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Join\SqlJoinTrait;
use Nemundo\Db\Sql\Order\SqlOrderTrait;
use Nemundo\Db\Sql\Parameter\SqlStatement;

class UpdateQuery extends AbstractBaseClass
{

    use SqlJoinTrait;
    use SqlOrderTrait;

    /**
     * @var string
     */
    public $tableName;

    /**
     * @var Filter
     */
    public $filter;

    /**
     * @var int
     */
    public $limit;

    /**
     * @var SqlStatement
     */
    private $sqlParameter;


    public function __construct()
    {
        $this->filter = new Filter();
        $this->sqlParameter = new SqlStatement();

    }


    public function setValue($fieldName, $value)
    {
        $this->sqlParameter->addParameter($fieldName, $value, $fieldName);
        return $this;
    }


    public function getSqlParameter()
    {

        if (!$this->checkProperty('tableName')) {
            return;
        }

        $sqlField = '';

        foreach ($this->sqlParameter->getParameterList() as $parameter) {
            if ($sqlField != '') {
                $sqlField = $sqlField . ',';
            }
            $sqlField = $sqlField . '`' . $parameter->key . '`=:' . $parameter->key;
        }

        $sql = 'UPDATE `' . $this->tableName . '` ';

        //  Join
        foreach ($this->joinList as $join) {
            $sql .= $join->getSql();
        }

        $sql .= ' SET ' . $sqlField;


        if ($this->filter->isNotEmpty()) {
            $sqlParameterList = $this->filter->getSqlStatement();
            $sql .= ' WHERE ' . $sqlParameterList->sql;
            $this->sqlParameter->addParameterList($sqlParameterList->getParameterList());
        }

        /*
        $sqlParameterList = $this->filter->getSqlParameterList();
        $sqlWhere = $sqlParameterList->sql;
        if ($sqlWhere !== '') {
            $sqlWhere = ' WHERE ' . $sqlWhere;
        }
        $sql .= $sqlWhere;*/

        //$this->sqlParameter->addParameterList($sqlParameterList->getParameterList());


        $sql .= $this->getOrderSql();

        // LIMIT
        if ($this->limit !== null) {
            //$sql .= ' LIMIT ' . $this->limitStart . ',' . $this->limit;
            $sql .= ' LIMIT ' . $this->limit;
        }


        $this->sqlParameter->sql = $sql;


        // LIMIT


        return $this->sqlParameter;

    }

}