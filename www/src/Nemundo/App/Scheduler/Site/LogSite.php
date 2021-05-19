<?php

namespace Nemundo\App\Scheduler\Site;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Application\Com\ListBox\ApplicationListBox;
use Nemundo\App\Scheduler\Com\ListBox\SchedulerStatusListBox;
use Nemundo\App\Scheduler\Com\Navigation\SchedulerNavigation;

use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogPaginationReader;
use Nemundo\App\Scheduler\Page\LogPage;
use Nemundo\App\Scheduler\Status\ChanceledSchedulerStatus;
use Nemundo\App\Scheduler\Status\FinishedSchedulerStatus;
use Nemundo\App\Scheduler\Status\PlannedSchedulerStatus;
use Nemundo\App\Scheduler\Template\SchedulerTemplate;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Web\Site\AbstractSite;

class LogSite extends AbstractSite
{

    /**
     * @var LogSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Log';
        $this->url = 'log';
        //$this->menuActive = false;

        LogSite::$site = $this;
    }


    public function loadContent()
    {

        (new LogPage())->render();

        /*
        $page =new SchedulerTemplate();  // (new DefaultTemplateFactory())->getDefaultTemplate();

        //new SchedulerNavigation($page);

        //$title = new AdminTitle($page);
        //$title->content = 'Log';

        $form = new SearchForm($page);

        $formRow = new BootstrapRow($form);

        $applicationListBox = new ApplicationListBox($formRow);
        $applicationListBox->submitOnChange = true;
        $applicationListBox->searchMode=true;

        $statusListBox = new SchedulerStatusListBox($formRow);
        $statusListBox->submitOnChange = true;
        $statusListBox->searchMode=true;

        $duration = new BootstrapListBox($formRow);
        $duration->label = 'Duration';
        $duration->searchMode = true;
        $duration->submitOnChange = true;
        $duration->addItem(10, '10 second or more');
        $duration->addItem(30, '30 second or more');
        $duration->addItem(60, '1 minute or more');
        $duration->addItem(120, '2 minute or more');


        $table = new AdminTable($page);

        $header = new TableHeader($table);
        $header->addText('Application');
        $header->addText('Class Name');
        $header->addText('Status');
        $header->addText('Planned Date/Time');
        $header->addText('Running Date/Time');
        $header->addText('Duration');

        $logReader = new SchedulerLogPaginationReader();  // new SchedulerLogPaginationModelReader();
        $logReader->model->loadSchedulerStatus();
        $logReader->model->loadScheduler();
        $logReader->model->scheduler->loadScript();
        $logReader->model->scheduler->script->loadApplication();
        $logReader->addOrder($logReader->model->schedulerStatusId);
        $logReader->addOrder($logReader->model->runningDateTime, SortOrder::DESCENDING);
        $logReader->paginationLimit = 100;

        $statusId = $statusListBox->getValue();
        if ($statusId !== '') {
            $logReader->filter->andEqual($logReader->model->schedulerStatusId, $statusId);
        }

        $applicationId = $applicationListBox->getValue();
        if ($applicationId !== '') {
            $logReader->filter->andEqual($logReader->model->scheduler->script->applicationId, $applicationId);
        }

        if ($duration->hasValue()) {
            $logReader->filter->andEqualOrGreater($logReader->model->duration, $duration->getValue());
        }

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

        $pagination = new BootstrapPagination($page);
        $pagination->paginationReader = $logReader;


        $page->render();*/

    }

}