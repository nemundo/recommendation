<?php

namespace Nemundo\Content\App\IssueTracker\Content\IssueTracker;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Content\App\IssueTracker\Data\Issue\IssuePaginationReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class IssueTrackerContentView extends AbstractContentView
{
    /**
     * @var IssueTrackerContentType
     */
    public $contentType;

    public $viewName= 'Pagination';

    protected function loadView()
    {
        // TODO: Implement loadView() method.
    }

    public function getContent()
    {


        $table = new AdminClickableTable($this);


        $reader=new IssuePaginationReader();
        foreach ($reader->getData() as $issueRow) {

            $row=new BootstrapClickableTableRow($table);
            $row->addText($issueRow->issue);

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader=$reader;


        // redirect


        return parent::getContent();
    }
}