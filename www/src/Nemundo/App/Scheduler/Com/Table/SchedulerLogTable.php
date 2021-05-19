<?php

namespace Nemundo\App\Scheduler\Com\Table;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\App\Application\Com\Container\AbstractApplicationFilterContainer;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Scheduler\Check\RepeatingTime;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerReader;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogPaginationReader;
use Nemundo\App\Scheduler\Parameter\SchedulerParameter;
use Nemundo\App\Scheduler\Site\SchedulerEditSite;
use Nemundo\App\Scheduler\Site\SchedulerResetSite;
use Nemundo\App\Scheduler\Site\SchedulerRunSite;
use Nemundo\App\Scheduler\Site\SchedulerSchedulerLogSite;
use Nemundo\App\Scheduler\Status\ChanceledSchedulerStatus;
use Nemundo\App\Scheduler\Status\FinishedSchedulerStatus;
use Nemundo\App\Scheduler\Status\PlannedSchedulerStatus;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;


class SchedulerLogTable extends AbstractApplicationFilterContainer  // AbstractHtmlContainer
{

    /**
     * @var string
     */
   /* public $applicationId;


    public function filterByApplication(AbstractApplication $application)
    {

        $this->applicationId = $application->applicationId;
        return $this;

    }


    public function filterByApplicationId($applicationId)
    {

        $this->applicationId = $applicationId;
        return $this;

    }*/


    public function getContent()
    {


        $table = new AdminTable($this);

        $header = new AdminTableHeader($table);
        $header->addText('Application');
        $header->addText('Class Name');
        $header->addText('Status');
        $header->addText('Planned Date/Time');
        $header->addText('Running Date/Time');
        $header->addText('Duration');

        $logReader = new SchedulerLogPaginationReader();
        $logReader->model->loadSchedulerStatus();
        $logReader->model->loadScheduler();
        $logReader->model->scheduler->loadScript();
        $logReader->model->scheduler->script->loadApplication();
        $logReader->addOrder($logReader->model->schedulerStatusId);
        $logReader->addOrder($logReader->model->runningDateTime, SortOrder::DESCENDING);
        $logReader->paginationLimit = 100;

        /*$statusId = $statusListBox->getValue();
        if ($statusId !== '') {
            $logReader->filter->andEqual($logReader->model->schedulerStatusId, $statusId);
        }*/

        //$applicationId = $applicationListBox->getValue();
        if ($this->applicationId !== '') {
            $logReader->filter->andEqual($logReader->model->scheduler->script->applicationId, $this->applicationId);
        }

        /*if ($duration->hasValue()) {
            $logReader->filter->andEqualOrGreater($logReader->model->duration, $duration->getValue());
        }*/

        foreach ($logReader->getData() as $logRow) {

            $row = new TableRow($table);
            $row->addText($logRow->scheduler->script->application->application);
            $row->addText($logRow->scheduler->script->scriptClass);
            $row->addText($logRow->schedulerStatus->schedulerStatus);
            $row->addText($logRow->plannedDateTime->getShortDateTimeLeadingZeroFormat());

            if ($logRow->schedulerStatusId != (new PlannedSchedulerStatus())->id && $logRow->schedulerStatusId != (new ChanceledSchedulerStatus())->id) {
                $row->addText($logRow->runningDateTime->getShortDateTimeLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }

            if ($logRow->schedulerStatusId == (new FinishedSchedulerStatus())->id) {
                $row->addText($logRow->duration . ' sec');
            } else {
                $row->addEmpty();
            }

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $logReader;


        return parent::getContent();

    }

}