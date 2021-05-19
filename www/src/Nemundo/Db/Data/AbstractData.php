<?php

namespace Nemundo\Db\Data;


use Nemundo\Db\Execute\SqlExecute;
use Nemundo\Db\Sql\InsertQuery;


abstract class AbstractData extends AbstractDataUpdate
{

    /**
     * @var bool
     */
    public $ignoreIfExists = false;

    /**
     * @var bool
     */
    public $updateOnDuplicate = false;

    /**
     * @var InsertQuery
     */
    private $insertQuery;


    function __construct()
    {
        parent::__construct();
        $this->insertQuery = new InsertQuery();
    }


    protected function setValue($fieldName, $value)
    {
        $this->insertQuery->setValue($fieldName, $value);
        return $this;
    }


    public function save()
    {

        if (!$this->checkConnection()) {
            return;
        }

        /*
        if (!$this->checkProperty('tableName')) {
            return;
        }*/

        $this->insertQuery->tableName = $this->tableName;
        $this->insertQuery->ignoreIfExists = $this->ignoreIfExists;
        $this->insertQuery->updateOnDuplicate = $this->updateOnDuplicate;
        $this->insertQuery->closeValuePart();

        //$id = $this->connection->execute($this->insertQuery->getSqlParameter());

        $execute = new SqlExecute();
        $execute->connection=$this->connection;
        $id =$execute->execute($this->insertQuery->getSqlParameter());

        return $id;

    }

}