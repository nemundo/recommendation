<?php

namespace Nemundo\App\DbAdmin\Scheduler;


use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\Core\Archive\ZipArchive;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Db\Provider\MySql\Dump\MySqlDump;
use Nemundo\Project\ProjectConfig;

class MySqlDumpScheduler extends AbstractScheduler
{

    protected function loadScheduler()
    {
        $this->active = false;
        $this->scriptName = 'mysql-dump';  // db-dump
        $this->overrideSetting = false;
        $this->description = 'Create a MySql Dump File in path /backup/dump';
        $this->consoleScript = true;
    }

    public function run()
    {

        $path = (new Path())
            ->addPath(ProjectConfig::$projectPath)
            ->addPath('backup')
            ->addPath('dump' )
            ->createPath()
            ->getPath();

        $dateTime = new Text((new DateTime())->setNow()->getIsoDate());
        $dateTime->replace('-', '_');
        $dateTime->replace(':', '_');
        $dateTime->replace(' ', '__');

        $backupFilename = $path . 'dump_' . $dateTime->getValue() . '.sql';
        $zipFilename = $path . 'dump_' . $dateTime->getValue() . '.zip';

        $mysqlDump = new MySqlDump();
        $mysqlDump->dumpFilename = $backupFilename;
        $mysqlDump->createDumpFile();

        $zip = new ZipArchive();
        $zip->archiveFilename = $zipFilename;
        $zip->addFilename($backupFilename);
        $zip->createArchive();

        $file = new File($backupFilename);
        $file->deleteFile();


    }

}