<?php

namespace Nemundo\User\Install;


use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\User\Data\UserModelCollection;

class UserUninstall extends AbstractUninstall
{

    public function uninstall()
    {

        (new ModelCollectionSetup())
            ->removeCollection(new UserModelCollection());

    }

}