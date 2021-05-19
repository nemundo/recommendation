<?php

namespace Nemundo\App\Scheduler\Site;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Scheduler\Com\Navigation\SchedulerNavigation;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerReader;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogReader;
use Nemundo\App\Scheduler\Parameter\SchedulerParameter;
use Nemundo\App\Scheduler\Status\RunningSchedulerStatus;
use Nemundo\App\Scheduler\Template\SchedulerTemplate;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

class SchedulerRunningSite extends AbstractSite
{

    /**
     * @var SchedulerRunningSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Running';
        $this->url = 'running';
        //$this->menuActive = false;

        new SchedulerResetSite($this);

        SchedulerRunningSite::$site = $this;
    }


    public function loadContent()
    {

        $page = new SchedulerTemplate();  // (new DefaultTemplateFactory())->getDefaultTemplate();

        //new SchedulerNavigation($page);

        //$title = new AdminTitle($page);
        //$title->content = 'Running';

        $table = new AdminTable($page);

        $header = new AdminTableHeader($table);
        $header->addText('Application');
        $header->addText('Class Name');
        $header->addText('Running Date/Time');
        $header->addEmpty();


        $schedulerReader = new SchedulerReader();
        $schedulerReader->model->loadScript();
        $schedulerReader->model->script->loadApplication();
        $schedulerReader->filter->andEqual($schedulerReader->model->running, true);
        foreach ($schedulerReader->getData() as $schedulerRow) {

            $row = new TableRow($table);
            $row->addText($schedulerRow->script->application->application);
            $row->addText($schedulerRow->script->scriptClass);

            $logReader = new SchedulerLogReader();
            $logReader->filter->andEqual($logReader->model->schedulerId, $schedulerRow->id);
            $logReader->filter->andEqual($logReader->model->schedulerStatusId, (new RunningSchedulerStatus())->id);
            foreach ($logReader->getData() as $logRow) {
                $row->addText($logRow->runningDateTime->getShortDateTimeLeadingZeroFormat());
            }

            $site = clone(SchedulerResetSite::$site);
            $site->addParameter(new SchedulerParameter($schedulerRow->id));
            $site->title = 'Reset';
            $row->addSite($site);

        }

        $page->render();

    }

}