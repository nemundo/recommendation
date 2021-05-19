<?php

namespace Nemundo\Content\App\Task\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Task\Data\TaskModelCollection;
use Nemundo\Content\App\Task\Install\TaskInstall;
use Nemundo\Content\App\Task\Install\TaskUninstall;
use Nemundo\Content\App\Task\Site\TaskSite;

class TaskApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Task';
        $this->applicationId = '376203dd-b6b6-475f-94a7-b94f9f374d0d';
        $this->modelCollectionClass = TaskModelCollection::class;
        $this->installClass = TaskInstall::class;
        $this->uninstallClass=TaskUninstall::class;
        $this->appSiteClass = TaskSite::class;
    }
}