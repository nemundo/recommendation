<?php

namespace Nemundo\App\Scheduler\Script;


use Nemundo\App\Scheduler\Check\JobCheck;
use Nemundo\App\Scheduler\Check\SchedulerCheck;
use Nemundo\App\Script\Type\AbstractConsoleScript;

// SchedulerRunScript
class SchedulerCheckScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'scheduler-check';
    }


    public function run()
    {

        (new SchedulerCheck())->checkScheduler();
        (new JobCheck())->checkJob();

    }

}