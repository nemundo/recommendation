<?php

namespace Nemundo\App\Mail\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Mail\Application\MailApplication;
use Nemundo\App\Mail\Data\MailModelCollection;
use Nemundo\App\Mail\Scheduler\MailQueueScheduler;
use Nemundo\App\Mail\Script\MailQueueDeleteScript;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;

class MailInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new MailApplication());

        (new ModelCollectionSetup())
            ->addCollection(new MailModelCollection());

        (new ScriptSetup(new MailApplication()))
            ->addScript(new MailQueueDeleteScript());

        (new SchedulerSetup(new MailApplication()))
            ->addScheduler(new MailQueueScheduler());

    }

}