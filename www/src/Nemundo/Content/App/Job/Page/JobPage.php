<?php

namespace Nemundo\Content\App\Job\Page;

use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Job\Com\Form\JobForm;
use Nemundo\Content\App\Job\Com\Table\JobTable;
use Nemundo\Content\App\Job\Data\JobScheduler\JobSchedulerPaginationReader;
use Nemundo\Content\App\Job\Data\JobScheduler\JobSchedulerReader;
use Nemundo\Content\App\Job\Site\JobClearSite;
use Nemundo\Content\App\Job\Template\JobTemplate;
use Nemundo\Core\Time\Second;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class JobPage extends JobTemplate
{
    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $widget = new AdminWidget($layout->col1);
        $widget->widgetTitle = 'Job Scheduler';

        $btn = new AdminSiteButton($widget);
        $btn->site = JobClearSite::$site;

        $table = new AdminTable($widget);

        $reader = new JobSchedulerPaginationReader();
        $reader->model->loadContent();
        $reader->model->content->loadContentType();
        //$reader->filter->andEqual($reader->model->done, false);

        $reader->addOrder($reader->model->done);
        $reader->addOrder($reader->model->id,SortOrder::DESCENDING);

        $header = new TableHeader($table);
        $header->addText('Job');
        $header->addText('Type');
        $header->addText('Subject');
        $header->addText('Duration');

        $header->addText($reader->model->finishedDateTime->label);
        $header->addEmpty();

        foreach ($reader->getData() as $schedulerRow) {

            $row = new TableRow($table);
            $row->addText($schedulerRow->content->subject);
            $row->addText($schedulerRow->content->contentType->contentType);


            $row->addText($schedulerRow->content->getContentType()->getSubject());



            if ($schedulerRow->done) {
                $row->addText( (new Second($schedulerRow->duration))->getText());
                $row->addText($schedulerRow->finishedDateTime->getShortDateTimeLeadingZeroFormat());
            } else {
                $row->addEmpty();
                $row->addEmpty();
            }

            $row->addYesNo($schedulerRow->done);

        }


        $widget = new AdminWidget($layout->col2);
        $widget->widgetTitle = 'Job';

        new JobForm($widget);


        new JobTable($layout->col2);


        return parent::getContent();

    }

}