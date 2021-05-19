<?php

namespace Nemundo\Content\App\Task\Install;

use Nemundo\Content\App\Task\Data\TaskModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractUninstall;

class TaskUninstall extends AbstractUninstall
{
    public function uninstall()
    {

        (new ModelCollectionSetup())
            ->removeCollection(new TaskModelCollection());

    }
}