<?php

namespace Nemundo\App\Scheduler\Status;


class RunningSchedulerStatus extends AbstractSchedulerStatus
{

    protected function loadSchedulerStatus()
    {
        $this->id = 1;
        $this->schedulerStatus = 'Running';

    }

}