<?php

namespace Nemundo\App\Scheduler\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Scheduler\Application\SchedulerApplication;
use Nemundo\App\Scheduler\Data\SchedulerModelCollection;
use Nemundo\App\Scheduler\Data\SchedulerStatus\SchedulerStatus;
use Nemundo\App\Scheduler\Data\SchedulerStatus\SchedulerStatusCount;
use Nemundo\App\Scheduler\Data\SchedulerStatus\SchedulerStatusUpdate;
use Nemundo\App\Scheduler\Script\SchedulerCheckScript;
use Nemundo\App\Scheduler\Script\SchedulerCleanScript;
use Nemundo\App\Scheduler\Script\SchedulerInactiveScipt;
use Nemundo\App\Scheduler\Status\AbstractSchedulerStatus;
use Nemundo\App\Scheduler\Status\ChanceledSchedulerStatus;
use Nemundo\App\Scheduler\Status\FinishedSchedulerStatus;
use Nemundo\App\Scheduler\Status\PlannedSchedulerStatus;
use Nemundo\App\Scheduler\Status\RunningSchedulerStatus;
use Nemundo\App\Script\Application\ScriptApplication;
use Nemundo\App\Script\Install\ScriptInstall;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;


class SchedulerInstall extends AbstractInstall
{

    public function install()
    {

        (new ScriptApplication())->installApp();

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new SchedulerModelCollection());

        $setup = new ApplicationSetup();
        $setup->addApplication(new SchedulerApplication());

        $setup = new ScriptSetup();
        $setup->application = new SchedulerApplication();
        $setup->addScript(new SchedulerCheckScript());
        $setup->addScript(new SchedulerReset());
        $setup->addScript(new SchedulerCleanScript());
        $setup->addScript(new SchedulerInactiveScipt());

        $this->addSchedulerStatus(new PlannedSchedulerStatus());
        $this->addSchedulerStatus(new RunningSchedulerStatus());
        $this->addSchedulerStatus(new FinishedSchedulerStatus());
        $this->addSchedulerStatus(new ChanceledSchedulerStatus());

    }


    private function addSchedulerStatus(AbstractSchedulerStatus $schedulerStatus)
    {

        $count = new SchedulerStatusCount();
        $count->filter->andEqual($count->model->id, $schedulerStatus->id);
        if ($count->getCount() == 0) {
        $data = new SchedulerStatus();
        //$data->updateOnDuplicate = true;
        $data->id = $schedulerStatus->id;
        $data->schedulerStatus = $schedulerStatus->schedulerStatus;
        $data->save();
        } else {
            $update = new SchedulerStatusUpdate();
            //$data->updateOnDuplicate = true;
            //$data->id = $schedulerStatus->id;
            $update->schedulerStatus = $schedulerStatus->schedulerStatus;
            $update->updateById($schedulerStatus->id);
        }

    }

}