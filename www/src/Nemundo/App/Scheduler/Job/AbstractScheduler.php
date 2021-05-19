<?php

namespace Nemundo\App\Scheduler\Job;


use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Core\Type\DateTime\Time;

abstract class AbstractScheduler extends AbstractScript
{

    /**
     * @var bool
     */
    public $overrideSetting = true;

    /**
     * @var bool
     */
    public $active = false;

    /**
     * @var int
     */
    public $minute = 0;

    /**
     * @var int
     */
    public $hour = 0;

    /**
     * @var int
     */
    public $day = 0;

    /**
     * @var bool
     */
    public $specificStartTime = false;

    /**
     * @var Time
     */
    public $startTime;


    // loadScheduler

    abstract protected function loadScheduler();

    public function __construct()
    {
        parent::__construct();
        $this->loadScheduler();
    }


    protected function loadScript()
    {
        parent::loadScript();
    }


    public function setActive() {

        $this->active=true;
        (new SchedulerSetup())->addScheduler($this);


    }


    public function setInactive() {

        $this->active=false;
        (new SchedulerSetup())->addScheduler($this);


    }


}