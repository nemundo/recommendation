<?php

namespace Nemundo\App\Application\Install;

use Nemundo\App\Application\Application\ApplicationApplication;
use Nemundo\App\Application\Data\ApplicationModelCollection;
use Nemundo\App\Application\Script\AppReinstallScript;
use Nemundo\App\Application\Script\ImageResizeScript;
use Nemundo\App\Application\Script\PackageSetupScript;
use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Usergroup\AdminUsergroup;
use Nemundo\App\Application\Usergroup\AppUsergroup;
use Nemundo\App\Application\Usergroup\DefaultUsergroup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\User\Setup\UsergroupSetup;

class ApplicationInstall extends AbstractInstall
{

    public function install()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new ApplicationModelCollection());

        $setup = new ApplicationSetup();
        $setup->addApplication(new ApplicationApplication());

        (new ScriptSetup(new ApplicationApplication()))
            ->addScript(new ImageResizeScript())
            ->addScript(new AppReinstallScript())
            ->addScript(new PackageSetupScript());

        (new UsergroupSetup())
            ->addUsergroup(new DefaultUsergroup())
            ->addUsergroup(new AppUsergroup())
            ->addUsergroup(new AdminUsergroup());

    }

}