<?php
namespace Nemundo\Db\Provider\MySql\Database;


use Nemundo\Db\Base\AbstractDbDataSource;
use Nemundo\Db\Reader\SqlReader;

class MySqlDatabaseReader extends AbstractDbDataSource
{

    /**
     * @return MySqlDatabase[]
     */
    public function getData()
    {
        return parent::getData();
    }


    protected function loadData()
    {

        $this->checkConnection();

        $reader = new SqlReader();
        $reader->connection = $this->connection;
        $reader->sqlStatement->sql = 'SHOW DATABASES;';

        foreach ($reader->getData() as $database) {
            //$this->list[] = $database->getValueByNumber(0);
            $mysqlDatabase = new MySqlDatabase();
            $mysqlDatabase->databaseName = $database->getValueByNumber(0);
            $this->list[] = $mysqlDatabase;
        }

    }

}