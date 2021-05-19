<?php


namespace Nemundo\App\Scheduler\Check;


use Nemundo\App\Scheduler\Builder\NextJobBuilder;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerReader;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerUpdate;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogCount;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogReader;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogUpdate;
use Nemundo\App\Scheduler\Status\FinishedSchedulerStatus;
use Nemundo\App\Scheduler\Status\PlannedSchedulerStatus;
use Nemundo\App\Scheduler\Status\RunningSchedulerStatus;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Date\DateTimeDifference;
use Nemundo\Core\Log\LogConfig;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Log\LogType;
use Nemundo\Core\Time\Stopwatch;
use Nemundo\Core\Type\DateTime\DateTime;

class SchedulerCheck extends AbstractBase
{

    public function checkScheduler() {


        LogConfig::$logType = [LogType::FILE];

        $schedulerReader = new SchedulerReader();
        $schedulerReader->model->loadScript();
        $schedulerReader->filter->andEqual($schedulerReader->model->active, true);
        $schedulerReader->filter->andEqual($schedulerReader->model->running, false);
        foreach ($schedulerReader->getData() as $schedulerRow) {

            $readerLastRunCount = new SchedulerLogCount();
            $readerLastRunCount->filter->andEqual($readerLastRunCount->model->schedulerId, $schedulerRow->id);
            $readerLastRunCount->filter->andEqual($readerLastRunCount->model->schedulerStatusId, (new PlannedSchedulerStatus())->id);

            if ($readerLastRunCount->getCount() > 0) {

                $readerLastRun = new SchedulerLogReader();
                $readerLastRun->filter->andEqual($readerLastRun->model->schedulerId, $schedulerRow->id);
                $readerLastRun->filter->andEqual($readerLastRun->model->schedulerStatusId, (new PlannedSchedulerStatus())->id);
                $readerLastRun->addOrder($readerLastRun->model->plannedDateTime);
                $readerLastRun->limit = 1;

                $schedulerLogRow = $readerLastRun->getRow();

                $difference = new DateTimeDifference();
                $difference->dateFrom = $schedulerLogRow->plannedDateTime;
                $difference->dateUntil = (new DateTime())->setNow();

                $differenceInSecond = $difference->getDifferenceInSecond();

                if ($differenceInSecond > 0) {

                    $update = new SchedulerUpdate();
                    $update->running = true;
                    $update->updateById($schedulerRow->id);

                    $data = new SchedulerLogUpdate();
                    $data->schedulerStatusId = (new RunningSchedulerStatus())->id;
                    $data->runningDateTime->setNow();
                    $data->updateById($schedulerLogRow->id);

                    $stopwatch = new Stopwatch();

                    $script = $schedulerRow->script->getScript();

                    try {
                        $script->run();
                    } catch (\Exception $exception) {
                        (new LogMessage())->writeError($exception->getMessage());
                    }

                    $duration = $stopwatch->stop();

                    $update = new SchedulerUpdate();
                    $update->running = false;
                    $update->updateById($schedulerRow->id);

                    $data = new SchedulerLogUpdate();
                    $data->duration = $duration;
                    $data->schedulerStatusId = (new FinishedSchedulerStatus())->id;
                    $data->updateById($schedulerLogRow->id);

                    $builder = new NextJobBuilder();
                    $builder->schedulerId = $schedulerRow->id;
                    $builder->buildNextJob();

                }

            } else {

                if (!$schedulerRow->running) {
                    (new LogMessage())->writeError('Scheduler Job not planned. Job: ' . $schedulerRow->script->scriptName);
                }

            }

        }


    }

}