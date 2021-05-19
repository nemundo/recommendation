<?php

namespace Nemundo\App\Backup\Scheduler;


use Nemundo\App\Backup\Path\BackupPath;
use Nemundo\App\Backup\Path\DumpBackupPath;
use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\Core\Archive\ZipArchive;
use Nemundo\Core\Http\Domain\DomainInformation;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Db\Provider\MySql\Dump\MySqlDump;

class BackupDumpScheduler extends AbstractScheduler
{

    protected function loadScheduler()
    {

        $this->active = false;
        $this->scriptName = 'backup-dump';
        $this->overrideSetting = false;
        $this->description = 'Create a MySql Dump File in path /backup/dump';
        $this->consoleScript = true;

    }


    public function run()
    {

        (new BackupPath())->createPath();

        $dateTime = new Text((new DateTime())->setNow()->getIsoDateTime());
        $dateTime->replace('-', '_');
        $dateTime->replace(':', '_');
        $dateTime->replace(' ', '__');

        $uniqueName = (new DomainInformation())->getHost(). '_' . $dateTime->getValue();

        //$backupFilename = $path . 'dump_' . $dateTime->getValue() . '.sql';
        //$zipFilename = $path . 'dump_' . $dateTime->getValue() . '.zip';

        $sqlFilename = (new DumpBackupPath())
            ->addPath($uniqueName . '.sql')
            ->getFullFilename();

        $mysqlDump = new MySqlDump();
        $mysqlDump->dumpFilename = $sqlFilename;

        //$backupFilename;
        $mysqlDump->createDumpFile();

        $zip = new ZipArchive();
        $zip->archiveFilename = (new DumpBackupPath())
            ->addPath($uniqueName . '.zip')
            ->getFullFilename();

        //$zipFilename;

        $zip->addFilename($sqlFilename);
        $zip->createArchive();

        (new File($sqlFilename))->deleteFile();


    }

}