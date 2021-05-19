<?php

namespace Nemundo\Content\App\Share\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Content\App\Share\Action\PrivateShare\PrivateShareAction;
use Nemundo\Content\App\Share\Application\ShareApplication;
use Nemundo\Content\App\Share\Data\ShareModelCollection;
use Nemundo\Content\Setup\ContentActionSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;

class ShareInstall extends AbstractInstall
{
    public function install()
    {
        (new ApplicationSetup())->addApplication(new ShareApplication());
        (new ModelCollectionSetup())->addCollection(new ShareModelCollection());

        (new ContentActionSetup())
            ->addContentAction(new PrivateShareAction());

    }
}