<?php

namespace Nemundo\Db\Provider\MySql\Connection;


use Nemundo\Db\Connection\AbstractConnection;


class MySqlConnection extends AbstractConnection
{

    /**
     * @var MySqlConnectionParameter
     */
    public $connectionParameter;

    public function __construct()
    {
        $this->connectionParameter = new MySqlConnectionParameter();
        parent::__construct();
    }


    protected function connect()
    {

        $property = [];
        $property[\PDO::MYSQL_ATTR_INIT_COMMAND] = 'SET NAMES utf8mb4';
        $property[\PDO::MYSQL_ATTR_LOCAL_INFILE] = true;

        $this->createPdoConnection('mysql:host=' . $this->connectionParameter->host . ';port=' . $this->connectionParameter->port . ';dbname=' . $this->connectionParameter->database . ';charset=utf8', $this->connectionParameter->user, $this->connectionParameter->password, $property);

    }

}