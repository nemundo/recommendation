<?php


namespace Nemundo\App\Scheduler\Check;


use Nemundo\App\Scheduler\Data\Job\JobReader;
use Nemundo\App\Scheduler\Data\Job\JobUpdate;
use Nemundo\App\Scheduler\Status\FinishedSchedulerStatus;
use Nemundo\App\Scheduler\Status\PlannedSchedulerStatus;
use Nemundo\App\Scheduler\Status\RunningSchedulerStatus;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Time\Stopwatch;

class JobCheck extends AbstractBase
{

    public function checkJob()
    {

        $jobReader = new JobReader();
        $jobReader->model->loadScript();
        $jobReader->filter->andEqual($jobReader->model->statusId, (new PlannedSchedulerStatus())->id);
        foreach ($jobReader->getData() as $jobRow) {

            $update = new JobUpdate();
            $update->statusId = (new RunningSchedulerStatus())->id;
            $update->updateById($jobRow->id);

            $time = new Stopwatch();

            $script = $jobRow->script->getScript();
            $script->run();

            $update = new JobUpdate();
            $update->finished = true;
            $update->statusId = (new FinishedSchedulerStatus())->id;
            $update->duration = $time->stop();
            $update->updateById($jobRow->id);

        }

    }

}