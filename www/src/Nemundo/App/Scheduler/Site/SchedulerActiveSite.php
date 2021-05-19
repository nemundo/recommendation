<?php

namespace Nemundo\App\Scheduler\Site;


use Nemundo\App\Scheduler\Builder\NextJobBuilder;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerUpdate;
use Nemundo\App\Scheduler\Parameter\SchedulerParameter;
use Nemundo\Package\FontAwesome\Icon\ActiveIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Project\Usergroup\SystemAdministratorUsergroup;
use Nemundo\Core\Http\Url\UrlReferer;

class SchedulerActiveSite extends AbstractIconSite
{

    protected function loadSite()
    {
        $this->url = 'active';
        $this->menuActive = false;
        //$this->restricted = true;
        //$this->addRestrictedUsergroup(new SystemAdministratorUsergroup());
        $this->icon = new ActiveIcon();

    }


    public function loadContent()
    {

        $schedulerId = (new SchedulerParameter())->getValue();

        $update = new SchedulerUpdate();
        $update->active = true;
        $update->updateById($schedulerId);

        // Next Job
        $builder = new NextJobBuilder();
        $builder->schedulerId = $schedulerId;
        $builder->setNow = true;
        $builder->buildNextJob();


        (new UrlReferer())->redirect();

    }

}