<?php


namespace Nemundo\Db\Execute;


use Nemundo\Db\Sql\Parameter\SqlStatement;

class SqlExecute extends AbstractSqlExecute
{

    public function execute(SqlStatement $sql)
    {
        return parent::execute($sql);
    }

}