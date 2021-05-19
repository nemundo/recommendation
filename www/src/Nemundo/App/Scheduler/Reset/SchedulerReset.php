<?php


namespace Nemundo\App\Scheduler\Reset;


use Nemundo\App\Scheduler\Data\Scheduler\SchedulerDelete;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerReader;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerUpdate;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogDelete;
use Nemundo\Project\Reset\AbstractReset;

class SchedulerReset extends AbstractReset
{

    public function reset()
    {

        $update = new SchedulerUpdate();
        $update->setupStatus = false;
        $update->update();

    }


    public function remove()
    {

        $delete = new SchedulerDelete();
        $delete->filter->andEqual($delete->model->setupStatus, false);
        $delete->delete();

        $delete = new SchedulerLogDelete();
        $reader = new SchedulerReader();
        foreach ($reader->getData() as $schedulerRow) {
            $delete->filter->andNotEqual($delete->model->schedulerId, $schedulerRow->id);
        }
        $delete->delete();

    }

}