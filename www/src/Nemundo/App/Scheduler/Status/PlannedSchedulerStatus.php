<?php

namespace Nemundo\App\Scheduler\Status;


class PlannedSchedulerStatus extends AbstractSchedulerStatus
{

    protected function loadSchedulerStatus()
    {
        $this->id = 0;
        $this->schedulerStatus = 'Planned';

    }

}