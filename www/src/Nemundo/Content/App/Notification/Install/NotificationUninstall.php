<?php

namespace Nemundo\Content\App\Notification\Install;

use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Content\App\Notification\Data\NotificationModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;

class NotificationUninstall extends AbstractUninstall
{
    public function uninstall()
    {

        (new ModelCollectionSetup())->removeCollection(new NotificationModelCollection());

    }
}