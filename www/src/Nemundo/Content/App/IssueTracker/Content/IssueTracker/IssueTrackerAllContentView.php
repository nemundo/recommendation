<?php

namespace Nemundo\Content\App\IssueTracker\Content\IssueTracker;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Content\App\IssueTracker\Data\Issue\IssuePaginationReader;
use Nemundo\Content\App\IssueTracker\Data\Issue\IssueReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class IssueTrackerAllContentView extends AbstractContentView
{
    /**
     * @var IssueTrackerContentType
     */
    public $contentType;

    public $viewName= 'All';

    protected function loadView()
    {
        // TODO: Implement loadView() method.
    }
    public function getContent()
    {


        $p=new Paragraph($this);
        $p->content = 'Show all result';


        $table = new AdminClickableTable($this);

        $reader=new IssueReader();
        foreach ($reader->getData() as $issueRow) {

            $row=new BootstrapClickableTableRow($table);
            $row->addText($issueRow->issue);

        }

        return parent::getContent();
    }
}