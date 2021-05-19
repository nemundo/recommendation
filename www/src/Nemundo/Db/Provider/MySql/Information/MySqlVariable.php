<?php


namespace Nemundo\Db\Provider\MySql\Information;


use Nemundo\Db\Base\AbstractDbBase;
use Nemundo\Db\Execute\SqlExecute;
use Nemundo\Db\Reader\SqlReader;
use Nemundo\Db\Sql\Parameter\SqlStatement;

class MySqlVariable extends AbstractDbBase
{

    public function getValue($variableName)
    {

        $query = new SqlReader();
        $query->sqlStatement->sql = 'SHOW VARIABLES LIKE "' . $variableName . '"';
        $row = $query->getRow();
        $value = $row->getValue('Value');
        return $value;

    }


    public function setValue($variableName, $value)
    {

        $sql = new SqlStatement();
        $sql->sql = 'SET GLOBAL ' . $variableName . '=' . $value . ';';

        $execute = new SqlExecute();
        $execute->connection = $this->connection;
        $execute->execute($sql);

    }

}