<?php

namespace Nemundo\App\Scheduler\Site;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Scheduler\Com\Navigation\SchedulerNavigation;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerReader;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogCount;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogModel;

use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogPaginationReader;
use Nemundo\App\Scheduler\Parameter\SchedulerParameter;
use Nemundo\App\Scheduler\Status\ChanceledSchedulerStatus;
use Nemundo\App\Scheduler\Status\PlannedSchedulerStatus;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\FontAwesome\FontAwesomeIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;

class SchedulerSchedulerLogSite extends AbstractIconSite
{

    /**
     * @var LogSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Scheduler Log';
        $this->url = 'scheduler-log';
        $this->menuActive = false;

        $this->icon = new FontAwesomeIcon();
        $this->icon->icon = 'history';

        SchedulerSchedulerLogSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        new SchedulerNavigation($page);


        $schedulerId = (new SchedulerParameter())->getValue();

        $schedulerReader= new SchedulerReader();
        $schedulerReader->model->loadScript();
        $schedulerRow = $schedulerReader->getRowById($schedulerId);

        $subtitle = new AdminSubtitle($page);
        $subtitle->content = $schedulerRow->script->scriptClass;


        $model = new SchedulerLogModel();
        $filter = new Filter();
        $filter->andEqual($model->schedulerId, $schedulerId);

        $count = new SchedulerLogCount();
        $count->filter =$filter;

        $p = new Paragraph($page);
        $p->content = $count->getCount() . ' Log found';


        $table = new AdminTable($page);

        $header = new TableHeader($table);
        $header->addText('Status');
        $header->addText('Planned Date/Time');
        $header->addText('Running Date/Time');
        $header->addText('Duration');

        $logReader = new SchedulerLogPaginationReader();
        $logReader->model->loadSchedulerStatus();
        $logReader->filter = $filter;
        $logReader->addOrder($logReader->model->plannedDateTime, SortOrder::DESCENDING);
        $logReader->paginationLimit = 100;

        foreach ($logReader->getData() as $logRow) {

            $row = new TableRow($table);
            $row->addText($logRow->schedulerStatus->schedulerStatus);
            $row->addText($logRow->plannedDateTime->getShortDateTimeLeadingZeroFormat());

            if ($logRow->schedulerStatusId != (new PlannedSchedulerStatus())->id && $logRow->schedulerStatusId != (new ChanceledSchedulerStatus())->id) {
                $row->addText($logRow->runningDateTime->getShortDateTimeLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }

            $row->addText($logRow->duration . ' sec');

        }

        $pagination = new BootstrapPagination($page);
        $pagination->paginationReader = $logReader;

        $page->render();

    }

}