<?php

namespace Nemundo\Db\Provider\MySql\Index;


use Nemundo\Db\Sql\Parameter\SqlStatement;

class MySqlUniqueIndex extends AbstractMySqlIndex
{

    public $tableName;

    public $columnName;

    protected function loadIndex()
    {
        $this->indexType = MySqlIndexType::UNIQUE;
    }


    /*
    public function dropIndex()
    {

        $sqlParameter = new SqlStatement();
        $sqlParameter->sql = 'ALTER TABLE `' . $this->tableName . '` DROP INDEX `' . $this->indexName . '`;';
        $this->connection->execute($sqlParameter);

    }*/

}