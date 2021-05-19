<?php

namespace Nemundo\App\Scheduler\Status;


class ChanceledSchedulerStatus extends AbstractSchedulerStatus
{

    protected function loadSchedulerStatus()
    {
        $this->id = 3;
        $this->schedulerStatus = 'Chanceled';

    }

}