<?php

namespace Nemundo\App\Scheduler\Status;


class FinishedSchedulerStatus extends AbstractSchedulerStatus
{

    protected function loadSchedulerStatus()
    {
        $this->id = 2;
        $this->schedulerStatus = 'Finished';

    }

}