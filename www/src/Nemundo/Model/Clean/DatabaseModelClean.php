<?php

namespace Nemundo\Model\Clean;


use Nemundo\App\Application\Type\Install\AbstractInstall;

class DatabaseModelClean extends AbstractDatabaseModelClean
{

    public function addInstall(AbstractInstall $install)
    {
        parent::addInstall($install);
    }

}