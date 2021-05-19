<?php

namespace Nemundo\Content\App\IssueTracker\Page;

use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\IssueTracker\Content\Issue\IssueProcess;
use Nemundo\Content\App\IssueTracker\Data\Issue\IssuePaginationReader;
use Nemundo\Content\App\IssueTracker\Parameter\IssueParameter;
use Nemundo\Content\App\IssueTracker\Site\IssueTrackerSite;
use Nemundo\Content\Com\Dropdown\ContentActionDropdown;
use Nemundo\Package\Bootstrap\Button\BootstrapButton;
use Nemundo\Package\Bootstrap\Dropdown\BootstrapDropdown;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class IssueTrackerPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 4;
        $layout->col2->columnWidth = 8;


        $btn = new AdminSiteButton($layout->col1);
        $btn->site = clone(IssueTrackerSite::$site);
        $btn->site->title = 'New';


        $table = new AdminClickableTable($layout->col1);


        $reader = new IssuePaginationReader();
        $reader->model->loadPriority();


        $header = new AdminTableHeader($table);
        $header->addText($reader->model->issue->label);
        $header->addText($reader->model->priority->label);

        foreach ($reader->getData() as $issueRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($issueRow->issue);
            $row->addText($issueRow->priority->priority);

            //$issueContentType = new IssueContentType($issueRow->id);
            //$row->addClickableSite($this->getContentRedirectSite($issueContentType->getContentId()));

            $site = clone(IssueTrackerSite::$site);
            $site->addParameter(new IssueParameter($issueRow->id));
            $row->addClickableSite($site);


        }

        $pagination = new BootstrapPagination($layout->col1);
        $pagination->paginationReader = $reader;


        $parameter = new IssueParameter();

        if ($parameter->hasValue()) {


            $issue = new IssueProcess($parameter->getValue());

            //$issue->getViewList($layout->col1);

            $issue->getDefaultForm($layout->col2);


            // AbstractDropdownMenuSite
            $dropdown = new ContentActionDropdown($layout->col2);
            $dropdown->contentId=$issue->getContentId();
            /*$dropdown->addItem('Save to Favorite',0);
            $dropdown->addItem('Save to Wiki',0);
            $dropdown->addItem('Delete/Archive',0);*/


            $btn = new BootstrapButton($layout->col2);
            $btn->content = 'Solved';

            $btn = new BootstrapButton($layout->col2);
            $btn->content = 'Cancel';

            $btn = new BootstrapButton($layout->col2);
            $btn->content = 'Comment';

        } else {

            $issue = new IssueProcess();
            $issue->getDefaultForm($layout->col2);

        }


        return parent::getContent();
    }
}