<?php

namespace Nemundo\App\Scheduler\Site;


use Nemundo\App\Scheduler\Builder\NextJobBuilder;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerUpdate;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogUpdate;
use Nemundo\App\Scheduler\Parameter\SchedulerParameter;
use Nemundo\App\Scheduler\Status\ChanceledSchedulerStatus;
use Nemundo\App\Scheduler\Status\RunningSchedulerStatus;
use Nemundo\Package\FontAwesome\Icon\ActiveIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class SchedulerResetSite extends AbstractIconSite
{

    /**
     * @var SchedulerResetSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Reset';
        $this->url = 'reset';
        $this->menuActive = false;
        $this->icon = new ActiveIcon();

        SchedulerResetSite::$site = $this;

    }


    public function loadContent()
    {

        $schedulerId = (new SchedulerParameter())->getValue();

        $update = new SchedulerLogUpdate();
        $update->filter->andEqual($update->model->schedulerId, $schedulerId);
        $update->filter->andEqual($update->model->schedulerStatusId, (new RunningSchedulerStatus())->id);
        $update->schedulerStatusId = (new ChanceledSchedulerStatus())->id;
        $update->update();

        $update = new SchedulerUpdate();
        $update->running = false;
        $update->updateById($schedulerId);

        $builder = new NextJobBuilder();
        $builder->schedulerId = $schedulerId;
        $builder->setNow = true;
        $builder->buildNextJob();

        (new UrlReferer())->redirect();

    }

}