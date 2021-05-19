<?php

namespace Nemundo\App\Application\Com\Container;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Scheduler\Check\RepeatingTime;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerReader;
use Nemundo\App\Scheduler\Parameter\SchedulerParameter;
use Nemundo\App\Scheduler\Site\SchedulerEditSite;
use Nemundo\App\Scheduler\Site\SchedulerResetSite;
use Nemundo\App\Scheduler\Site\SchedulerRunSite;
use Nemundo\App\Scheduler\Site\SchedulerSchedulerLogSite;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Html\Container\AbstractHtmlContainer;


class AbstractApplicationFilterContainer extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    protected $applicationId;


    public function filterByApplication(AbstractApplication $application)
    {

        $this->applicationId = $application->applicationId;
        return $this;

    }


    public function filterByApplicationId($applicationId)
    {

        $this->applicationId = $applicationId;
        return $this;

    }



}