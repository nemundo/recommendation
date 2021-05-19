<?php

namespace Nemundo\Db\Provider\MySql\Index\Reader;


use Nemundo\Db\Base\AbstractDbDataSource;
use Nemundo\Db\Provider\MySql\Table\MySqlTable;
use Nemundo\Db\Reader\SqlReader;


// Problem: nicht index, sondern fields


class MySqlIndexReader extends AbstractDbDataSource
{

    /**
     * @var string
     */
    public $tableName;


    protected function loadData()
    {

        if (!$this->checkProperty('tableName')) {
            return;
        }

        if (!$this->checkConnection()) {
            return;
        }

        $this->checkConnection();

        $tableReader = new MySqlTable();
        $tableReader->tableName = $this->tableName;
        if ($tableReader->existsTable()) {

            $sql = 'SHOW INDEX FROM `' . $this->tableName . '`;';

            $reader = new SqlReader();
            $reader->connection = $this->connection;
            $reader->sqlStatement->sql = $sql;

            foreach ($reader->getData() as $row) {

                $index = new MySqlIndexItem();
                $index->tableName = $this->tableName;
                $index->indexName = $row->getValue('key_name');
                $index->columnName = $row->getValue('Column_name');
                $index->indexType = $row->getValue('Index_type');

                $this->addItem($index);

            }

        }

    }


    /**
     * @return MySqlIndexItem[]
     */
    public function getData()
    {
        return parent::getData();
    }


    public function existsIndex($indexName)
    {

        $exists = false;
        foreach ($this->getData() as $mySqlIndex) {
            if ($mySqlIndex->indexName == $indexName) {
                $exists = true;
            }
        }
        return $exists;

    }

}