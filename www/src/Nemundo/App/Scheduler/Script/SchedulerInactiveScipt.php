<?php

namespace Nemundo\App\Scheduler\Script;


use Nemundo\App\Scheduler\Builder\NextJobBuilder;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerCount;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerReader;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerUpdate;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogDelete;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Debug\Debug;

class SchedulerInactiveScipt extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'scheduler-inactive';
    }


    public function run()
    {

            $update = new SchedulerUpdate();
            $update->active = false;
            $update->update();

    }

}