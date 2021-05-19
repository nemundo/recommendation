<?php

namespace Nemundo\Content\Index\Relation\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\Index\Relation\Application\RelationApplication;
use Nemundo\Content\Index\Relation\Data\RelationModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class RelationInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())->addApplication(new RelationApplication());
        (new ModelCollectionSetup())->addCollection(new RelationModelCollection());

    }
}