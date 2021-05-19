<?php

namespace Nemundo\App\Scheduler\Site;


use Nemundo\App\Scheduler\Data\Scheduler\SchedulerUpdate;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogUpdate;
use Nemundo\App\Scheduler\Parameter\SchedulerParameter;
use Nemundo\App\Scheduler\Status\ChanceledSchedulerStatus;
use Nemundo\App\Scheduler\Status\PlannedSchedulerStatus;
use Nemundo\Package\FontAwesome\Icon\InactiveIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class SchedulerInactiveSite extends AbstractIconSite
{

    protected function loadSite()
    {
        $this->url = 'inactive';
        $this->menuActive = false;
        $this->icon = new InactiveIcon();
    }


    public function loadContent()
    {

        $schedulerId = (new SchedulerParameter())->getValue();

        $update = new SchedulerLogUpdate();
        $update->filter->andEqual($update->model->schedulerId, $schedulerId);
        $update->filter->andEqual($update->model->schedulerStatusId, (new PlannedSchedulerStatus())->id);
        $update->schedulerStatusId = (new ChanceledSchedulerStatus())->id;
        $update->update();

        $update = new SchedulerUpdate();
        $update->active = false;
        $update->running = false;
        $update->updateById($schedulerId);

        (new UrlReferer())->redirect();

    }

}