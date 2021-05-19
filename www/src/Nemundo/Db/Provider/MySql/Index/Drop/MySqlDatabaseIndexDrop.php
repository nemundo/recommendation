<?php

namespace Nemundo\Db\Provider\MySql\Index\Drop;


use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Base\AbstractDbBase;
use Nemundo\Db\Provider\MySql\Table\MySqlTableReader;


class MySqlDatabaseIndexDrop extends AbstractDbBase
{

    public function dropAllIndex()
    {

        $reader = new MySqlTableReader();
        $reader->connection = $this->connection;
        foreach ($reader->getData() as $mySqlTable) {


            //(new Debug())->write('TABLE: '.$mySqlTable->tableName);

            (new MySqlTableIndexDrop($mySqlTable->tableName))->dropAllIndex();



        }

    }

}