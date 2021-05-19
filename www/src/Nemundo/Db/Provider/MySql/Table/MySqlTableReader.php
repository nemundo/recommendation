<?php
namespace Nemundo\Db\Provider\MySql\Table;


use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Base\AbstractDbDataSource;
use Nemundo\Db\Reader\SqlReader;


// to do:
// gibt mySql table objects zurück
// mysql mit getTableField

class MySqlTableReader extends AbstractDbDataSource
{


    // database


    /**
     * @var string
     */
    public $filter;

    /**
     * @return MySqlTable[]
     */
    public function getData()
    {
        return parent::getData();
    }


    protected function loadData()
    {

        $this->checkConnection();

        $sql = 'SHOW TABLES;';

        // Filter
        if ($this->filter !== null) {
            $sql = 'SHOW TABLES LIKE "' . $this->filter . '%";';
        }

        $reader = new SqlReader();
        $reader->connection = $this->connection;
        $reader->sqlStatement->sql = $sql;

        foreach ($reader->getData() as $dbName) {

            //(new Debug())->write($dbName);

            $mysqlTable = new MySqlTable();
            $mysqlTable->connection = $this->connection;
            $mysqlTable->tableName = $dbName->getValueByNumber(0);

            $this->list[] = $mysqlTable;

        }

    }

}
