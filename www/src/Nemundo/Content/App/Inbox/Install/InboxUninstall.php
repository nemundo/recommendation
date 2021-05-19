<?php

namespace Nemundo\Content\App\Inbox\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Inbox\Action\SendToContentAction;
use Nemundo\Content\App\Inbox\Application\InboxApplication;
use Nemundo\Content\App\Inbox\Data\InboxModelCollection;
use Nemundo\Content\Setup\ContentActionSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Application\Type\Install\AbstractUninstall;

class InboxUninstall extends AbstractUninstall
{
    public function uninstall()
    {

        (new ModelCollectionSetup())
            ->removeCollection(new InboxModelCollection());

        (new ContentActionSetup())
            ->removeContentAction(new SendToContentAction());

    }
}