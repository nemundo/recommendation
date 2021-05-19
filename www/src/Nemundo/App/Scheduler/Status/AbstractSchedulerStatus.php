<?php

namespace Nemundo\App\Scheduler\Status;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractSchedulerStatus extends AbstractBase
{

    /**
     * @var int
     */
    public $id;
    // schedulerId

    /**
     * @var string
     */
    public $schedulerStatus;


    abstract protected function loadSchedulerStatus();

    public function __construct()
    {
        $this->loadSchedulerStatus();
    }


}