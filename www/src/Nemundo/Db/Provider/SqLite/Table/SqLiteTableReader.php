<?php

namespace Nemundo\Db\Provider\SqLite\Table;


use Nemundo\Db\Base\AbstractDbDataSource;
use Nemundo\Db\Reader\SqlReader;


// to do:
// gibt mySql table objects zurück
// mysql mit getTableField

class SqLiteTableReader extends AbstractDbDataSource
{

    /**
     * @var string
     */
    //public $filter;

    /**
     * @return SqLiteTable[]
     */
    public function getData()
    {
        return parent::getData();
    }


    protected function loadData()
    {

        $this->checkConnection();

        $sql = 'SELECT * FROM sqlite_master where type="table";';

        // Filter
        /*if ($this->filter !== null) {
            $sql = 'SHOW TABLES LIKE "' . $this->filter . '%";';
        }*/

        $reader = new SqlReader();
        $reader->connection = $this->connection;
        $reader->sqlStatement->sql = $sql;

        foreach ($reader->getData() as $dbName) {
            $table = new SqLiteTable();
            $table->tableName = $dbName->getValue('tbl_name');

            $this->list[] = $table;

        }

    }

}
