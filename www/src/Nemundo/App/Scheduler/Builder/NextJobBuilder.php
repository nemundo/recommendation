<?php

namespace Nemundo\App\Scheduler\Builder;


use Nemundo\App\Scheduler\Check\RepeatingTime;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerReader;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLog;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogUpdate;
use Nemundo\App\Scheduler\Status\ChanceledSchedulerStatus;
use Nemundo\App\Scheduler\Status\PlannedSchedulerStatus;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\DateTime\DateTime;

class NextJobBuilder extends AbstractBase
{

    /**
     * @var string
     */
    public $schedulerId;

    /**
     * @var bool
     */
    public $setNow = false;


    public function buildNextJob()
    {

        if (!$this->checkProperty('schedulerId')) {
            return;
        }

        $schedulerRow = (new SchedulerReader())->getRowById($this->schedulerId);
        if (!$schedulerRow->running) {

            // Chancel Planned Jobs
            $update = new SchedulerLogUpdate();
            $update->filter->andEqual($update->model->schedulerId, $this->schedulerId);
            $update->filter->andEqual($update->model->schedulerStatusId, (new PlannedSchedulerStatus())->id);
            $update->schedulerStatusId = (new ChanceledSchedulerStatus())->id;
            $update->update();

            $schedulerRow = (new SchedulerReader())->getRowById($this->schedulerId);

            if ($schedulerRow->active) {

                $repeatingTime = new RepeatingTime();
                $repeatingTime->day = $schedulerRow->day;
                $repeatingTime->hour = $schedulerRow->hour;
                $repeatingTime->minute = $schedulerRow->minute;


                $plannedDateTime = new DateTime();  //)->setNow();
                if ($schedulerRow->specificStartTime) {

                    // Problem: Heute in der Vergangenheit

                    $plannedDateTime->setNow();
                    $plannedDateTime->setTime($schedulerRow->startTime);

                    if ($plannedDateTime->isDateTimeInThePast()) {
                        $plannedDateTime->addMinute($repeatingTime->getMinute());
                    }

                } else {

                    $plannedDateTime->setNow();
                    $plannedDateTime->setSecond(0);

                    if (!$this->setNow) {
                        $plannedDateTime->addMinute($repeatingTime->getMinute());
                    }

                }

                $data = new SchedulerLog();
                $data->schedulerId = $schedulerRow->id;
                $data->schedulerStatusId = (new PlannedSchedulerStatus())->id;
                $data->plannedDateTime = $plannedDateTime;
                $data->save();

            }

        }

    }

}