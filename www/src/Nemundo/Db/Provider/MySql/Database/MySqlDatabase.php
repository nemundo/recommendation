<?php

namespace Nemundo\Db\Provider\MySql\Database;

use Nemundo\Db\Base\AbstractDbBase;
use Nemundo\Db\Provider\MySql\Connection\MySqlConnection;
use Nemundo\Db\Provider\MySql\Table\MySqlTableReader;
use Nemundo\Db\Sql\Parameter\SqlStatement;


class MySqlDatabase extends AbstractDbBase
{

    /**
     * @var string
     */
    public $databaseName;

    public function __construct($databaseName = null)
    {
        parent::__construct();
        $this->databaseName = $databaseName;
    }


    public function existsDatabase()
    {

        $exists = false;

        $connTmp = new MySqlConnection();
        $connTmp->connectionParameter->host = $this->connection->connectionParameter->host;
        $connTmp->connectionParameter->user = $this->connection->connectionParameter->user;
        $connTmp->connectionParameter->password = $this->connection->connectionParameter->password;
        $connTmp->connectionParameter->port = $this->connection->connectionParameter->port;

        $sqlParamter = new SqlStatement();
        $sqlParamter->sql = 'SHOW DATABASES LIKE \'' . $this->databaseName . '\';';

        $query = $connTmp->query($sqlParamter);
        if (sizeof($query) > 0) {
            $exists = true;
        }

        return $exists;

    }


    public function createDatabase()
    {

        if (!$this->checkConnection()) {
            return false;
        }

        if ($this->databaseName == null) {
            $this->databaseName = $this->connection->connectionParameter->database;
        }

        // Tmp Connection ohne Datenbank
        $connTmp = new MySqlConnection();
        $connTmp->connectionParameter->host = $this->connection->connectionParameter->host;
        $connTmp->connectionParameter->user = $this->connection->connectionParameter->user;
        $connTmp->connectionParameter->password = $this->connection->connectionParameter->password;
        $connTmp->connectionParameter->port = $this->connection->connectionParameter->port;

        //create database my_db character set UTF8MB4;

        $sqlParamter = new SqlStatement();
        $sqlParamter->sql = 'CREATE DATABASE IF NOT EXISTS `' . $this->databaseName . '`;';

        $connTmp->execute($sqlParamter);

        return $this;

    }


    public function dropDatabase()
    {

        if ($this->databaseName == null) {
            $this->databaseName = $this->connection->connectionParameter->database;
        }

        $sqlParamter = new SqlStatement();
        $sqlParamter->sql = 'DROP DATABASE IF EXISTS `' . $this->databaseName . '`;';

        $this->connection->execute($sqlParamter);

        return $this;

    }


    public function emptyDatabase()
    {

        $reader = new MySqlTableReader();
        $reader->connection = $this->connection;
        foreach ($reader->getData() as $table) {
            $table->dropTable();
        }

        return $this;

    }

}
