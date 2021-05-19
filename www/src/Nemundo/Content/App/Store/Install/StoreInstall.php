<?php

namespace Nemundo\Content\App\Store\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Store\Application\StoreApplication;
use Nemundo\Content\App\Store\Data\StoreModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class StoreInstall extends AbstractInstall
{
    public function install()
    {
        (new ApplicationSetup())->addApplication(new StoreApplication());
        (new ModelCollectionSetup())->addCollection(new StoreModelCollection());
    }
}