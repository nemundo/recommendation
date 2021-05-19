<?php

namespace Nemundo\App\SystemLog\Site;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Application\Com\ListBox\ApplicationListBox;

use Nemundo\App\SystemLog\Page\SystemLogPage;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Web\Site\AbstractSite;

class SystemLogSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'System Log';
        $this->url = 'system-log';
    }

    public function loadContent()
    {

        (new SystemLogPage())->render();

        /*

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new AdminTitle($page);
        $title->content = $this->title;


        $searchForm = new SearchForm($page);

        $row = new BootstrapRow($searchForm);

        $applicationListBox = new ApplicationListBox($row);
        $applicationListBox->submitOnChange = true;
        $applicationListBox->value = $applicationListBox->getValue();

        $typeListbox = new LogTypeListBox($row);
        $typeListbox->submitOnChange = true;
        $typeListbox->value = $typeListbox->getValue();


        $table = new AdminTable($page);

        $header = new TableHeader($table);
        $header->addText('Application');
        $header->addText('Log Type');
        $header->addText('Message');
        $header->addText('Date/Time');

        $reader = new SystemLogPaginationModelReader();
        $reader->model->loadApplication();
        $reader->model->loadLogType();
        $reader->paginationLimit = 50;

        $applicationId = $applicationListBox->getValue();
        if ($applicationId) {
            $reader->filter->andEqual($reader->model->applicationId, $applicationId);
        }

        $logTypeId = $typeListbox->getValue();
        if ($logTypeId) {
            $reader->filter->andEqual($reader->model->logTypeId, $logTypeId);
        }

        $reader->addOrder($reader->model->dateTime, SortOrder::DESCENDING);

        foreach ($reader->getData() as $logRow) {

            $row = new TableRow($table);
            $row->addText($logRow->application->application);
            $row->addText($logRow->logType->logType);
            $row->addText($logRow->message);
            $row->addText($logRow->dateTime->getShortDateTimeLeadingZeroFormat());

        }

        $pagination = new BootstrapPagination($page);
        $pagination->paginationReader = $reader;

        $page->render();*/

    }

}