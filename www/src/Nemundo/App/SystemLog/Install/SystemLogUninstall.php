<?php

namespace Nemundo\App\SystemLog\Install;

use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\App\SystemLog\Data\SystemLogModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;

class SystemLogUninstall extends AbstractUninstall
{

    public function uninstall()
    {

        (new ModelCollectionSetup())
            ->removeCollection(new SystemLogModelCollection());

    }

}