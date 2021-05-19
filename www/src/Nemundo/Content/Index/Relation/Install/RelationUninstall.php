<?php

namespace Nemundo\Content\Index\Relation\Install;

use Nemundo\Content\Index\Relation\Data\RelationModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractUninstall;

class RelationUninstall extends AbstractUninstall
{
    public function uninstall()
    {

        (new ModelCollectionSetup())
            ->removeCollection(new RelationModelCollection());

    }
}