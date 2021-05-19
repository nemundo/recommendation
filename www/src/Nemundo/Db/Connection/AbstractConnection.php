<?php

namespace Nemundo\Db\Connection;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Db\DbConfig;
use Nemundo\Db\Sql\Parameter\SqlStatement;


abstract class AbstractConnection extends AbstractBaseClass
{

    /**
     * @var \PDO
     */
    private $pdo = null;

    /**
     * @var bool
     */
    protected $connected = false;


    abstract protected function connect();


    public function __construct()
    {
        $this->loadConnection();
    }

    protected function loadConnection()
    {

    }


    public function checkConnection()
    {
        $this->connect();
        return $this->connected;
    }

    protected function createPdoConnection($dataSourceName, $user = null, $password = null, $option = null)
    {

        if (!$this->connected) {

            try {
                $this->pdo = new \PDO($dataSourceName, $user, $password, $option);
                $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $this->connected = true;
            } catch (\PDOException $e) {
                $errorMessage = 'Connect Error: ' . $e->getMessage();
                (new LogMessage())->writeError($errorMessage);
                exit;
            }

        }

    }


    protected function disconnect()
    {
        $this->pdo = null;
    }


    public function execute(SqlStatement $sqlStatement)
    {

        $time = microtime(true);

        $this->prepareQuery($sqlStatement);
        $id = $this->pdo->lastInsertId();

        //$time = round(microtime(true) - $time, 2);

        $time = round(microtime(true) - $time, 2);
        $this->slowQueryLog($time,$sqlStatement->sql);

/*
        if (DbConfig::$slowQueryLog) {

            if ($time > DbConfig::$slowQueryLimit) {

                $logFilename = DbConfig::$slowQueryLogPath . 'slow_query_'. date('Y-m-d') . '.txt';

                $message = date('Y-m-d H:i:s') . ';' . $time . ';' . $sqlStatement->sql;
                $file = fopen($logFilename, 'a');
                fwrite($file, $message . PHP_EOL);
                fclose($file);

            }

        }*/

        return $id;
    }


    public function query(SqlStatement $sqlStatement)
    {

        if (DbConfig::$logQuery) {
            (new SqlLog())->logSqlParameter($sqlStatement);

        }

        $time = microtime(true);

        $data = [];
        $query = $this->prepareQuery($sqlStatement);
        try {
            if (is_object($query)) {
                $data = $query->fetchAll(\PDO::FETCH_ASSOC);
            }
        } catch (\PDOException $e) {
            $errorMessage = 'Query Error: ' . $e->getMessage() . 'Sql: ' . $sqlStatement->sql;
            (new LogMessage())->writeError($errorMessage);
        }


        $time = round(microtime(true) - $time, 2);
        $this->slowQueryLog($time,$sqlStatement->sql);

        /*
        if (DbConfig::$slowQueryLog) {

            if ($time > DbConfig::$slowQueryLimit) {

                $logFilename = DbConfig::$slowQueryLogPath . date('Y-m-d') . '.txt';

                $message = date('Y-m-d H:i:s') . ';' . $time . ';' . $sqlStatement->sql;
                $file = fopen($logFilename, 'a');
                fwrite($file, $message . PHP_EOL);
                fclose($file);

            }

        }*/


        return $data;

    }


    public function queryRow(SqlStatement $sqlParameterList)
    {

        if (DbConfig::$logQuery) {
            (new SqlLog())->logSqlParameter($sqlParameterList);
        }

        $data = [];
        $query = $this->prepareQuery($sqlParameterList);
        try {
            if (is_object($query)) {
                $data = $query->fetch(\PDO::FETCH_ASSOC);
            }
        } catch (\PDOException $e) {
            $errorMessage = 'Query Error: ' . $e->getMessage() . 'Sql: ' . $sqlParameterList->sql;
            (new LogMessage())->writeError($errorMessage);
        }

        if ($data == null) {
            $data = [];
        }

        return $data;

    }


    public function queryValue(SqlStatement $sqlParameterList)
    {

        if (DbConfig::$logQuery) {
            (new SqlLog())->logSqlParameter($sqlParameterList);
        }

        $data = [];
        $query = $this->prepareQuery($sqlParameterList);
        try {
            if (is_object($query)) {
                $data = $query->fetch();
            }
        } catch (\PDOException $e) {
            $errorMessage = 'Query Error: ' . $e->getMessage() . 'Sql: ' . $sqlParameterList->sql;
            (new LogMessage())->writeError($errorMessage);
        }

        //$value = '';
        $value = null;
        if (isset($data[0])) {
            $value = $data[0];
        }

        return $value;

    }


    private function prepareQuery(SqlStatement $sqlParameterList)
    {

        $this->connect();

        $showErrorMessage = false;

        if (DbConfig::$sqlDebug) {
            (new Debug())->write($sqlParameterList->sql);
            (new Debug())->write($sqlParameterList->getParameterList());
        }

        if ($this->connected) {

            $query = null;
            try {

                $query = $this->pdo->prepare($sqlParameterList->sql);
                foreach ($sqlParameterList->getParameterList() as $parameter) {

                    if (is_bool($parameter->value)) {
                        $query->bindValue(':' . $parameter->key, $parameter->value, \PDO::PARAM_BOOL);
                    } else {
                        $query->bindValue(':' . $parameter->key, $parameter->value);
                    }

                }

                $query->execute();

            } catch (\PDOException $error) {

                $showErrorMessage = true;

                /*if (strpos($error->getMessage(), 'SQLSTATE[42S21]: Column already exists: 1060 Duplicate column name', 0) === 0) {
                    $showErrorMessage = false;
                }

                if (strpos($error->getMessage(), 'SQLSTATE[42000]: Syntax error or access violation: 1061 Duplicate key name', 0) === 0) {
                    $showErrorMessage = false;
                }*/

                if ($showErrorMessage) {
                    $errorMessage = 'Query Error: ' . $error->getMessage() . 'Sql: ' . $sqlParameterList->sql;

                    (new LogMessage())->writeError($errorMessage);
                    (new Debug())->write($sqlParameterList->getParameterList());

                }
            }

            return $query;

        }

        return $showErrorMessage;

    }



    private function slowQueryLog($time,$sql) {


        if (DbConfig::$slowQueryLog) {

            if ($time > DbConfig::$slowQueryLimit) {

                $logFilename = DbConfig::$slowQueryLogPath . 'slow_query_'. date('Y-m-d') . '.txt';

                $message = date('Y-m-d H:i:s') . ';' . $time . ';' . $sql;
                $file = fopen($logFilename, 'a');
                fwrite($file, $message . PHP_EOL);
                fclose($file);

            }

        }


    }

}
