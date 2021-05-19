<?php

namespace Nemundo\Content\App\Timeline\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Timeline\Application\TimelineApplication;
use Nemundo\Content\App\Timeline\Data\TimelineModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class TimelineInstall extends AbstractInstall
{
    public function install()
    {
        (new ApplicationSetup())
            ->addApplication(new TimelineApplication());

        (new ModelCollectionSetup())
            ->addCollection(new TimelineModelCollection());

    }
}