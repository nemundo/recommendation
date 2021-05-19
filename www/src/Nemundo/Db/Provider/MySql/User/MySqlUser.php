<?php


namespace Nemundo\Db\Provider\MySql\User;


use Nemundo\Db\Base\AbstractDbBase;
use Nemundo\Db\Sql\Parameter\SqlStatement;

class MySqlUser extends AbstractDbBase
{

    /**
     * @var string
     */
    public $login;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $database='*';


    public function createUser()
    {



        $this->runSql('CREATE USER "' . $this->login . '"@"localhost" IDENTIFIED BY "' . $this->password . '";');
        $this->runSql('GRANT ALL PRIVILEGES ON '.$this->database.'.* TO "' . $this->login . '"@"localhost";');
        //$this->runSql('FLUSH PRIVILEGES;');


        /*
         * CREATE USER 'kursklang'@'localhost' IDENTIFIED BY 'abc123456';
CREATE DATABASE kursklang;
GRANT ALL PRIVILEGES ON *.* TO 'kursklang'@'localhost';
FLUSH PRIVILEGES;
         */


    }


    private function runSql($sql)
    {
        $sqlStatement = new SqlStatement();
        $sqlStatement->sql = $sql;

        $this->connection->execute($sqlStatement);
    }


}