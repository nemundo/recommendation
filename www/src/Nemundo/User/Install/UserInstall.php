<?php

namespace Nemundo\User\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\User\Application\UserApplication;
use Nemundo\User\Data\UserModelCollection;
use Nemundo\User\Script\AdminUserScript;
use Nemundo\User\Script\UsergroupCleanScript;


class UserInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new UserApplication());

        (new ModelCollectionSetup())
            ->addCollection(new UserModelCollection());

        (new ScriptSetup(new UserApplication()))
            ->addScript(new AdminUserScript())
            ->addScript(new UsergroupCleanScript());

    }

}