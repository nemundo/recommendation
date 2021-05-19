<?php

namespace Nemundo\App\DbAdmin\Script;


use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Db\Provider\MySql\Table\MySqlTableReader;

class DbCleanScript extends AbstractScript
{

    protected function loadScript()
    {
        $this->scriptName = 'db-clean';
        $this->consoleScript = true;
    }

    public function run()
    {

        $reader = new MySqlTableReader();
        foreach ($reader->getData() as $table) {
            $table->dropTable();
        }

    }

}