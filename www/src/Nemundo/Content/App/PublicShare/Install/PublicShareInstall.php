<?php

namespace Nemundo\Content\App\PublicShare\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\PublicShare\Action\PublicShareAction;
use Nemundo\Content\App\PublicShare\Application\PublicShareApplication;
use Nemundo\Content\App\PublicShare\Data\PublicShareModelCollection;
use Nemundo\Content\Setup\ContentActionSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class PublicShareInstall extends AbstractInstall
{
    public function install()
    {
        (new ApplicationSetup())
            ->addApplication(new PublicShareApplication());

        (new ModelCollectionSetup())
            ->addCollection(new PublicShareModelCollection());

        (new ContentActionSetup())
            ->addContentAction(new PublicShareAction());


    }
}