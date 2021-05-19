<?php


namespace Nemundo\App\Scheduler\Check;


use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogReader;
use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\App\Scheduler\Status\FinishedSchedulerStatus;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Db\Sql\Order\SortOrder;

class LastUpdate extends AbstractBase
{

    /**
     * @var AbstractScheduler
     */
    private $scheduler;

    public function __construct(AbstractScheduler $scheduler)
    {
        $this->scheduler = $scheduler;
    }

    public function getLastUpdate()
    {


        $dateTime = null;

        $logReader = new SchedulerLogReader();
        $logReader->model->loadScheduler();
        $logReader->model->scheduler->loadScript();
        $logReader->filter->andEqual($logReader->model->scheduler->script->scriptClass, $this->scheduler->getClassName());
        $logReader->filter->andEqual($logReader->model->schedulerStatusId, (new FinishedSchedulerStatus())->id);
        $logReader->addOrder($logReader->model->plannedDateTime, SortOrder::DESCENDING);
        $logReader->limit = 1;
        foreach ($logReader->getData() as $logRow) {
            $dateTime = $logRow->runningDateTime;
        }

        return $dateTime;

    }


    public function getLastUpdateText()
    {

        $dateTime = $this->getLastUpdate();

        $text = 'No Update';
        if ($dateTime !== null) {
            $text = 'Last Update: ' . $dateTime->getShortDateTimeLeadingZeroFormat();
        }

        return $text;

    }


}