<?php

namespace Nemundo\Content\App\Dashboard\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\App\Dashboard\Application\DashboardApplication;
use Nemundo\Content\App\Dashboard\Content\Dashboard\DashboardContentType;
use Nemundo\Content\App\Dashboard\Content\DashboardColumn\DashboardColumnContentType;
use Nemundo\Content\App\Dashboard\Content\DashboardContentTypeCollection;
use Nemundo\Content\App\Dashboard\Content\UserDashboard\UserDashboardContentType;
use Nemundo\Content\App\Dashboard\Data\DashboardModelCollection;
use Nemundo\Content\App\Dashboard\Script\DashboardCleanScript;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractUninstall;

class DashboardUninstall extends AbstractUninstall
{

    public function uninstall()
    {

        (new ContentTypeSetup(new DashboardApplication()))
            ->removeContentTypeCollection(new DashboardContentTypeCollection());

/*
        (new ContentTypeSetup(new DashboardApplication()))
            ->removeContentType(new DashboardContentType())
            ->removeContentType(new DashboardColumnContentType())
            ->removeContentType(new UserDashboardContentType());
*/

        (new ModelCollectionSetup())
            ->removeCollection(new DashboardModelCollection());



    }

}