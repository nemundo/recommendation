<?php

namespace Nemundo\Project\Install;


use Nemundo\App\Apache\Application\ApacheApplication;
use Nemundo\App\Application\Application\ApplicationApplication;
use Nemundo\App\Application\Data\ApplicationModelCollection;
use Nemundo\App\Application\Install\ApplicationInstall;
use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Backup\Application\BackupApplication;
use Nemundo\App\ClassDesigner\Application\ClassDesignerApplication;
use Nemundo\App\Composer\Application\ComposerApplication;
use Nemundo\App\CssDesigner\Application\CssDesignerApplication;
use Nemundo\App\FileLog\Application\FileLogApplication;
use Nemundo\App\Git\Application\GitApplication;
use Nemundo\App\Help\Application\HelpApplication;
use Nemundo\App\Linux\Application\LinuxApplication;
use Nemundo\App\Mail\Application\MailApplication;
use Nemundo\App\Manifest\Application\ManifestApplication;
use Nemundo\App\ModelDesigner\Application\ModelDesignerApplication;
use Nemundo\App\MySql\Application\MySqlApplication;
use Nemundo\App\Scheduler\Application\SchedulerApplication;
use Nemundo\App\Scheduler\Data\SchedulerModelCollection;
use Nemundo\App\Script\Application\ScriptApplication;
use Nemundo\App\Script\Data\ScriptModelCollection;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\System\Application\SystemApplication;
use Nemundo\App\SystemLog\Application\SystemLogApplication;
use Nemundo\Dev\Script\AdminBuilderScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Path\LogPath;
use Nemundo\Project\Path\TmpPath;
use Nemundo\Project\Script\CacheDeleteScript;
use Nemundo\Project\Script\LogDeleteScript;
use Nemundo\Project\Script\ProjectCleanScript;
use Nemundo\Project\Script\TmpDeleteScript;
use Nemundo\User\Application\UserApplication;
use Nemundo\User\Data\UserModelCollection;


class ProjectInstall extends AbstractInstall
{

    public function install()
    {

        (new ModelCollectionSetup())
            ->addCollection(new UserModelCollection())
            ->addCollection(new ScriptModelCollection())
            ->addCollection(new SchedulerModelCollection())
            ->addCollection(new ApplicationModelCollection());

        (new ApplicationInstall())->install();
        (new ApplicationApplication())->installApp();

        (new UserApplication())->installApp();
        (new SchedulerApplication())->installApp();
        (new MailApplication())->installApp();

        (new ApplicationSetup())
            ->addApplication(new ComposerApplication())
            ->addApplication(new CssDesignerApplication())
            ->addApplication(new ManifestApplication())
            ->addApplication(new ModelDesignerApplication())
            ->addApplication(new ClassDesignerApplication())
            ->addApplication(new ApacheApplication())
            ->addApplication(new GitApplication())
            ->addApplication(new LinuxApplication())
            ->addApplication(new ScriptApplication())
            ->addApplication(new SystemApplication())
            ->addApplication(new SystemLogApplication())
            ->addApplication(new MySqlApplication())
            ->addApplication(new FileLogApplication())
            ->addApplication(new BackupApplication())
            ->addApplication(new HelpApplication());

        (new TmpPath())->createPath();
        (new LogPath())->createPath();

        (new ScriptSetup())
            ->addScript(new ProjectCleanScript())
            ->addScript(new TmpDeleteScript())
            ->addScript(new LogDeleteScript())
            ->addScript(new CacheDeleteScript())
            ->addScript(new AdminBuilderScript());

    }

}