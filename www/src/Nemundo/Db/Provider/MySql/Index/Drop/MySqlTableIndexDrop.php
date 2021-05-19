<?php

namespace Nemundo\Db\Provider\MySql\Index\Drop;


use Nemundo\Db\Base\AbstractDbBase;
use Nemundo\Db\Provider\MySql\Index\Reader\MySqlIndexReader;
use Nemundo\Db\Reader\SqlReader;
use Nemundo\Db\Sql\Parameter\SqlStatement;

class MySqlTableIndexDrop extends AbstractDbBase
{

    /**
     * @var string
     */
    private $tableName;

    public function __construct($tableName)
    {
        parent::__construct();
        $this->tableName = $tableName;
    }


    public function dropAllIndex()
    {

        $indexReader = new MySqlIndexReader();
        $indexReader->connection = $this->connection;
        $indexReader->tableName = $this->tableName;
        foreach ($indexReader->getData() as $indexRow) {
            if ($indexRow->indexName !== 'PRIMARY') {
                $this->dropIndex($indexRow->indexName);
            }
        }

    }


    public function existsIndex($indexName)
    {

        $value = false;

        $sql = 'SHOW INDEX FROM `' . $this->tableName . '` WHERE Key_Name = "' . $indexName . '";';

        $reader = new SqlReader();
        $reader->connection = $this->connection;
        $reader->sqlStatement->sql = $sql;
        if ($reader->getCount() > 0) {
            $value = true;
        }

        return $value;

    }


    public function dropIndex($indexName)
    {

        if ($this->existsIndex($indexName)) {

            $sql = 'ALTER TABLE `' . $this->tableName . '` DROP INDEX `' . $indexName . '`;';

            $sqlParameter = new SqlStatement();
            $sqlParameter->sql = $sql;
            $this->connection->execute($sqlParameter);

        }

        return $this;

    }

}