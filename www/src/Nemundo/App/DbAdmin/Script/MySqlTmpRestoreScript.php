<?php

namespace Nemundo\App\DbAdmin\Script;


use Nemundo\App\DbAdmin\Connection\RestoreConnection;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Type\File\File;
use Nemundo\Db\Provider\MySql\Dump\MySqlDump;
use Nemundo\Db\Provider\MySql\Dump\MySqlDumpRestore;
use Nemundo\Dev\Deployment\DeploymentConfig;
use Nemundo\Dev\Deployment\StagingEnvironment;
use Nemundo\Project\Path\TmpPath;
use Nemundo\Project\ProjectConfig;


class MySqlTmpRestoreScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'mysql-tmp-restore';
    }


    public function run()
    {

        if (DeploymentConfig::$stagingEnviroment == StagingEnvironment::PRODUCTION) {
            (new Debug())->write('You are on the production system !!!');
            exit;
        }

        (new Debug())->write('Maybe you want to run Clean Script');

        $filename = (new TmpPath())
            ->addPath('restore_tmp.sql')
            ->getFilename();

        $dump = new MySqlDump();
        $dump->connection = new RestoreConnection();
        $dump->dumpFilename = $filename;
        $dump->createDumpFile();

        $file = new File($filename);

        if ($file->fileExists()) {

            $restore = new MySqlDumpRestore();
            $restore->filename = $filename;
            $restore->restoreDumpFile();

            (new File($filename))->deleteFile();
            (new Debug())->write('Maybe you have to run setup');

        } else {

            (new LogMessage())->writeError('Dump File does not exist');

        }

    }

}