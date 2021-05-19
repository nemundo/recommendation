<?php

namespace Nemundo\Content\App\Notification\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Content\App\Notification\Application\NotificationApplication;
use Nemundo\Content\App\Notification\Data\NotificationModelCollection;
use Nemundo\Content\App\Notification\Type\NotificationIndexType;
use Nemundo\Content\Setup\IndexTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;

class NotificationInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())->addApplication(new NotificationApplication());
        (new ModelCollectionSetup())->addCollection(new NotificationModelCollection());

        (new IndexTypeSetup())->addIndexType(new NotificationIndexType());

    }
}