<?php

namespace Nemundo\App\Scheduler\Setup;


use Nemundo\App\Application\Setup\AbstractSetup;
use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Scheduler\Builder\NextJobBuilder;
use Nemundo\App\Scheduler\Data\Scheduler\Scheduler;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerCount;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerDelete;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerId;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerReader;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerUpdate;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogCount;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogDelete;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogUpdate;
use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\App\Scheduler\Status\ChanceledSchedulerStatus;
use Nemundo\App\Scheduler\Status\PlannedSchedulerStatus;
use Nemundo\App\Scheduler\Status\RunningSchedulerStatus;
use Nemundo\App\Script\Data\Script\ScriptId;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\DateTime\Time;
use Nemundo\Db\Filter\Filter;

class SchedulerSetup extends AbstractSetup
{

    public function addScheduler(AbstractScheduler $scheduler)
    {

        if ($scheduler->specificStartTime) {

            if (!$scheduler->startTime->isObjectOfClass(Time::class)) {
                (new LogMessage())->writeError('StartTime: No valid Time');
                return;
            }

        }

        (new ScriptSetup($this->application))
            ->addScript($scheduler);

        $newSchedulerJob = false;
        $changeRepeatingTime = false;

        $id = new ScriptId();
        $id->filter->andEqual($id->model->scriptClass, $scheduler->getClassName());
        $scriptId = $id->getId();

        $count = new SchedulerCount();
        $count->filter->andEqual($count->model->scriptId, $scriptId);
        if ($count->getCount() == 0) {
            $newSchedulerJob = true;
            $changeRepeatingTime = true;


            $data = new Scheduler();
            //$data->updateOnDuplicate = true;
            $data->scriptId = $scriptId;
            $data->overrideSetting = $scheduler->overrideSetting;
            $data->startTime = new Time('00:00');

            if (($scheduler->overrideSetting) || ($newSchedulerJob)) {
                $data->active = $scheduler->active;
                $data->day = $scheduler->day;
                $data->hour = $scheduler->hour;
                $data->minute = $scheduler->minute;

                $data->specificStartTime = $scheduler->specificStartTime;
                if ($scheduler->specificStartTime) {
                    $data->startTime = $scheduler->startTime;
                }
                $data->running = false;

            }

            $data->setupStatus = true;
            $data->save();


        } else {



            $update = new SchedulerUpdate();
            //$update->updateOnDuplicate = true;
            //$update->scriptId = $scriptId;
            $update->overrideSetting = $scheduler->overrideSetting;
            $update->startTime = new Time('00:00');

            if (($scheduler->overrideSetting) || ($newSchedulerJob)) {
                $update->active = $scheduler->active;
                $update->day = $scheduler->day;
                $update->hour = $scheduler->hour;
                $update->minute = $scheduler->minute;

                $update->specificStartTime = $scheduler->specificStartTime;
                if ($scheduler->specificStartTime) {
                    $update->startTime = $scheduler->startTime;
                }
                $update->running = false;

            }

            $update->setupStatus = true;
            $update->filter->andEqual($update->model->scriptId,$scriptId);
            $update->update();
            
            
            
            
            // Repeating Time Change Check
            $schedulerReader = new SchedulerReader();
            $schedulerReader->filter->andEqual($count->model->scriptId, $scriptId);
            $schedulerRow = $schedulerReader->getRow();

            if ($schedulerRow->minute != $scheduler->minute) {
                $changeRepeatingTime = true;
            }

            if ($schedulerRow->hour != $scheduler->hour) {
                $changeRepeatingTime = true;
            }

            if ($schedulerRow->day != $scheduler->day) {
                $changeRepeatingTime = true;
            }

        }

        $id = new SchedulerId();
        $id->filter->andEqual($id->model->scriptId, $scriptId);
        $schedulerId = $id->getId();

        if ($scheduler->active) {

            if (($scheduler->overrideSetting) || ($newSchedulerJob)) {

                // No planned Job
                $count = new SchedulerLogCount();
                $count->filter->andEqual($count->model->schedulerId, $schedulerId);
                $count->filter->andEqual($count->model->schedulerStatusId, (new PlannedSchedulerStatus())->id);
                if ($count->getCount() == 0) {
                    $changeRepeatingTime = true;
                }

                if ($changeRepeatingTime) {
                    $builder = new NextJobBuilder();
                    $builder->schedulerId = $schedulerId;
                    $builder->buildNextJob();
                }

            }

        } else {

            if ($scheduler->overrideSetting) {
                $update = new SchedulerLogUpdate();
                $update->filter->andEqual($update->model->schedulerId, $schedulerId);

                $filter = new Filter();
                $filter->orEqual($update->model->schedulerStatusId, (new PlannedSchedulerStatus())->id);
                $filter->orEqual($update->model->schedulerStatusId, (new RunningSchedulerStatus())->id);
                $update->filter->andFilter($filter);

                $update->schedulerStatusId = (new ChanceledSchedulerStatus())->id;
                $update->update();

            }

        }

        return $this;

    }


    public function removeScheduler(AbstractScheduler $scheduler)
    {

        $id = new ScriptId();
        $id->filter->andEqual($id->model->scriptClass, $scheduler->getClassName());
        $scriptId = $id->getId();

        $id = new SchedulerId();
        $id->filter->andEqual($id->model->scriptId, $scriptId);
        $schedulerId = $id->getId();

        $delete = new SchedulerLogDelete();
        $delete->filter->andEqual($delete->model->schedulerId, $schedulerId);
        $delete->delete();

        $delete = new SchedulerDelete();
        $delete->filter->andEqual($delete->model->scriptId, $scriptId);
        $delete->delete();

        (new ScriptSetup())->removeScript($scheduler);


    }


    public function removeSchedulerByApplication(AbstractApplication $application) {


        $reader = new SchedulerReader();
        $reader->model->loadScript();
        $reader->filter->andEqual($reader->model->script->applicationId,$application->applicationId);
        foreach ($reader->getData() as $schedulerRow) {
            //$schedulerRow->gets
        }



    }



    /*

    public function resetSetupStatus()
    {

        $update = new SchedulerUpdate();
        $update->setupStatus = false;
        $update->update();

    }


    public function removeUnusedScheduler()
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


    }*/

}