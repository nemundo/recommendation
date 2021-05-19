<?php

namespace Nemundo\App\DbAdmin\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Db\Provider\MySql\Index\MySqlIndexDropScript;
use Nemundo\Db\Provider\MySql\Table\MySqlTableReader;


class DbIndexDeleteScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'db-index-delete';
    }


    public function run()
    {

        $reader = new MySqlTableReader();
        foreach ($reader->getData() as $mySqlTable) {
            (new MySqlIndexDropScript($mySqlTable->tableName))->dropIndex();
        }

    }

}