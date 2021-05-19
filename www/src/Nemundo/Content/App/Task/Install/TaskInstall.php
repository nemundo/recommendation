<?php

namespace Nemundo\Content\App\Task\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Task\Application\TaskApplication;
use Nemundo\Content\App\Task\Data\TaskModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class TaskInstall extends AbstractInstall
{
    public function install()
    {
        (new ApplicationSetup())->addApplication(new TaskApplication());
        (new ModelCollectionSetup())->addCollection(new TaskModelCollection());
    }
}