<?php

namespace Nemundo\App\Scheduler\Page;

use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\App\Application\Com\ListBox\ApplicationListBox;
use Nemundo\App\Scheduler\Com\Form\JobForm;
use Nemundo\App\Scheduler\Data\Job\JobPaginationReader;
use Nemundo\App\Scheduler\Site\JobCleanSite;
use Nemundo\App\Scheduler\Site\JobSite;
use Nemundo\App\Scheduler\Status\FinishedSchedulerStatus;
use Nemundo\App\Scheduler\Template\SchedulerTemplate;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;

class JobPage extends SchedulerTemplate
{
    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $btn = new AdminIconSiteButton($layout->col1);
        $btn->site = JobCleanSite::$site;


        $jobReader = new JobPaginationReader();
        $jobReader->model->loadScript();
        $jobReader->model->loadStatus();
        $jobReader->addOrder($jobReader->model->finished);
        $jobReader->addOrder($jobReader->model->id);

        $table = new AdminTable($layout->col1);

        $header = new AdminTableHeader($table);
        $header->addText($jobReader->model->status->label);
        $header->addText($jobReader->model->script->label);
        $header->addText($jobReader->model->finished->label);
        $header->addText($jobReader->model->duration->label);

        foreach ($jobReader->getData() as $jobRow) {

            $row = new TableRow($table);
            $row->addText($jobRow->status->schedulerStatus);
            $row->addText($jobRow->script->scriptClass);
            $row->addYesNo($jobRow->finished);
            if ($jobRow->statusId == (new FinishedSchedulerStatus())->id) {
                $row->addText($jobRow->duration . ' sec');
            } else {
                $row->addEmpty();
            }


        }

        $pagination = new BootstrapPagination($layout->col1);
        $pagination->paginationReader = $jobReader;


        /*
        $searchForm=new SearchForm($layout->col2);

        $row=new BootstrapRow($searchForm);



        $app=new ApplicationListBox($row);
        $app->submitOnChange=true;
        $app->*/

        $form = new JobForm($layout->col2);
        $form->redirectSite = JobSite::$site;

        return parent::getContent();

    }

}