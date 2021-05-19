<?php

namespace Nemundo\Db\Base;

use Nemundo\Core\Log\LogMessage;
use Nemundo\Db\Connection\AbstractConnection;
use Nemundo\Db\DbConfig;
use Nemundo\Db\Provider\MySql\Connection\MySqlConnection;
use Nemundo\Db\Provider\SqLite\Connection\SqLiteConnection;


trait ConnectionTrait
{

    /**
     * @var AbstractConnection|SqLiteConnection|MySqlConnection
     */
    public $connection;


    protected function loadConnection()
    {

        if (DbConfig::$defaultConnection !== null) {
            $this->connection = DbConfig::$defaultConnection;
        }

    }


    protected function checkConnection()
    {

        if ($this->connection == null) {
            (new LogMessage())->writeError('No Connection defined');
            return false;
        }

        return true;

    }

}