<?php

namespace Nemundo\Db\Delete;

use Nemundo\Db\Base\AbstractDbBase;
use Nemundo\Db\Execute\SqlExecute;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Join\SqlJoinTrait;
use Nemundo\Db\Sql\Parameter\SqlStatement;

abstract class AbstractDataDelete extends AbstractDbBase
{

    use SqlJoinTrait;

    /**
     * @var Filter
     */
    public $filter;

    /**
     * @var string
     */
    protected $tableName;


    public function __construct()
    {
        parent::__construct();
        $this->filter = new Filter();
    }


    public function delete()
    {

        if (!($this->checkProperty('tableName'))) {
            return;
        }

        if (!$this->checkConnection()) {
            return;
        }

        $sql = 'DELETE `' . $this->tableName . '` FROM `' . $this->tableName . '`';

        foreach ($this->joinList as $join) {
            $sql .= $join->getSql();
        }


        $whereSql = $this->filter->getSqlStatement()->sql;

        if ($whereSql !== '') {
            $sql .= ' WHERE ' . $whereSql;
        }

        $sqlParameter = new SqlStatement();
        $sqlParameter->sql = $sql;
        $sqlParameter->addParameterList($this->filter->getSqlStatement()->getParameterList());

        //$this->connection->execute($sqlParameter);

        $execute = new SqlExecute();
        $execute->connection=$this->connection;
        $execute->execute($sqlParameter);


    }

}