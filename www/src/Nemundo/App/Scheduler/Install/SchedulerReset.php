<?php

namespace Nemundo\App\Scheduler\Install;


use Nemundo\App\Scheduler\Builder\NextJobBuilder;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerCount;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerReader;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerUpdate;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogDelete;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Debug\Debug;

class SchedulerReset extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'scheduler-reset';
    }


    public function run()
    {

        $count = new SchedulerCount();
        $count->filter->andEqual($count->model->running, true);
        if ($count->getCount() == 0) {

            (new SchedulerLogDelete())->delete();

            $update = new SchedulerUpdate();
            $update->running = false;
            $update->update();

            $reader = new SchedulerReader();
            foreach ($reader->getData() as $schedulerRow) {
                $nextJob = new NextJobBuilder();
                $nextJob->schedulerId = $schedulerRow->id;
                $nextJob->buildNextJob();
            }

        } else {
            (new Debug())->write('Jobs are running right now. Try later.');
        }

    }

}