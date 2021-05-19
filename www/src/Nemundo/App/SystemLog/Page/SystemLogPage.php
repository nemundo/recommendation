<?php

namespace Nemundo\App\SystemLog\Page;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\App\Application\Com\ListBox\ApplicationListBox;
use Nemundo\App\SystemLog\Com\ListBox\LogTypeListBox;
use Nemundo\App\SystemLog\Data\Log\LogPaginationReader;

use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;

class SystemLogPage extends AbstractTemplateDocument
{

    public function getContent()
    {


        $searchForm = new SearchForm($this);

        $row = new BootstrapRow($searchForm);

        $applicationListBox = new ApplicationListBox($row);
        $applicationListBox->submitOnChange = true;
        $applicationListBox->searchMode=true;
        $applicationListBox->column=true;
        $applicationListBox->columnSize=2;

        $typeListbox = new LogTypeListBox($row);
        $typeListbox->submitOnChange = true;
        $typeListbox->searchMode=true;
        $typeListbox->column=true;
        $typeListbox->columnSize=2;



        $table = new AdminTable($this);

        $header = new AdminTableHeader($table);
        $header->addText('Application');
        $header->addText('Log Type');
        $header->addText('Message');
        $header->addText('Date/Time');

        $reader = new LogPaginationReader();
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

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $reader;

        return parent::getContent();
    }

}