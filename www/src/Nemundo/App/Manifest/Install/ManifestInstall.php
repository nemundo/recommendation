<?php

namespace Nemundo\App\Manifest\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Manifest\Application\ManifestApplication;
use Nemundo\App\Manifest\Data\ManifestModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;

class ManifestInstall extends AbstractInstall
{
    public function install()
    {
        (new ApplicationSetup())->addApplication(new ManifestApplication());
        (new ModelCollectionSetup())->addCollection(new ManifestModelCollection());
    }
}