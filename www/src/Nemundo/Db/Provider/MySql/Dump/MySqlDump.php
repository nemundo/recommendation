<?php

namespace Nemundo\Db\Provider\MySql\Dump;


use Nemundo\Core\Path\Path;
use Nemundo\Core\Type\File\File;
use Nemundo\Db\Base\AbstractDbBase;
use Nemundo\Core\Local\LocalCommand;


class MySqlDump extends AbstractDbBase
{

    /**
     * @var string
     */
    public $dumpFilename;


    public function createDumpFile()
    {

        if (!$this->checkProperty('dumpFilename')) {
            return;
        }

        $path = new Path((new File($this->dumpFilename))->getPath());
        $path->createPath();

        $command = 'mysqldump --lock-tables=false  --single-transaction -h ' . $this->connection->connectionParameter->host . ' --user ' . $this->connection->connectionParameter->user . ' --password=' . $this->connection->connectionParameter->password . ' ' . $this->connection->connectionParameter->database . ' > ' . $this->dumpFilename;

        $cmd = new LocalCommand();
        $cmd->showOutput = false;
        $cmd->runLocalCommand($command);

    }

}