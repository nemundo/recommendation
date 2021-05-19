<?php

namespace Nemundo\Content\App\IssueTracker\Content\Issue;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Content\App\IssueTracker\Data\Issue\IssuePaginationReader;
use Nemundo\Content\View\AbstractContentListing;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class IssueContentListing extends AbstractContentListing
{




    public function getContent()
    {




        $table = new AdminClickableTable($this);


        $reader = new IssuePaginationReader();
        $reader->model->loadPriority();


        $header = new AdminTableHeader($table);
        $header->addText($reader->model->issue->label);
        $header->addText($reader->model->priority->label);

        foreach ($reader->getData() as $issueRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($issueRow->issue);
            $row->addText($issueRow->priority->priority);

            $issueContentType = new IssueProcess($issueRow->id);
            $row->addClickableSite($this->getContentRedirectSite($issueContentType->getContentId()));

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $reader;


        return parent::getContent();

    }

}