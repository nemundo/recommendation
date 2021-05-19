<?php

namespace Nemundo\Content\App\Location\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Location\Application\LocationApplication;
use Nemundo\Content\App\Location\Content\Location\LocationContentType;
use Nemundo\Content\App\Location\Data\LocationCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class LocationInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new LocationApplication());

        (new ModelCollectionSetup())
            ->addCollection(new LocationCollection());

        (new ContentTypeSetup(new LocationApplication()))
            ->addContentType(new LocationContentType());

    }
}