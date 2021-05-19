<?php

namespace Nemundo\App\Mail\Install;

use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\App\Mail\Data\MailCollection;
use Nemundo\App\Mail\Scheduler\MailQueueScheduler;
use Nemundo\App\Mail\Script\MailQueueDeleteScript;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;

class MailUninstall extends AbstractUninstall
{

    public function uninstall()
    {

        (new ModelCollectionSetup())
            ->removeCollection(new MailCollection());

        (new ScriptSetup())
            ->removeScript(new MailQueueDeleteScript());

        (new SchedulerSetup())
            ->removeScheduler(new MailQueueScheduler());

    }

}