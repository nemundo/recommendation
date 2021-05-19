<?php

namespace Nemundo\Db\Provider\MySql\Information;


use Nemundo\Db\Base\AbstractDbBase;
use Nemundo\Db\Reader\SqlReader;

class MySqlVersion extends AbstractDbBase
{


    /**
     * @return string
     */
    public function getMySqlVersion()
    {

        $sqlReader = new SqlReader();
        $sqlReader->sqlStatement->sql = 'SELECT VERSION() version;';
        $row = $sqlReader->getRow();
        $version = $row->getValue('version');

        return $version;

    }


    public function getUpTime()
    {

        $sqlReader = new SqlReader();
        $sqlReader->sqlStatement->sql = 'SHOW GLOBAL STATUS LIKE "Uptime";';
        $row = $sqlReader->getRow();
        $uptime = $row->getValue('value');

        return $uptime;

    }


}