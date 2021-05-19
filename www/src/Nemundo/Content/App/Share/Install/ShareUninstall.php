<?php

namespace Nemundo\Content\App\Share\Install;

use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Content\App\Share\Action\PrivateShare\PrivateShareAction;
use Nemundo\Content\App\Share\Data\ShareModelCollection;
use Nemundo\Content\Setup\ContentActionSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;

class ShareUninstall extends AbstractUninstall
{
    public function uninstall()
    {

        (new ModelCollectionSetup())->removeCollection(new ShareModelCollection());

        (new ContentActionSetup())
            ->removeContentAction(new PrivateShareAction());

    }
}