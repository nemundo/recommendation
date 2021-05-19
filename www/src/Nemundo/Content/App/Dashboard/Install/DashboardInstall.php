<?php


namespace Nemundo\Content\App\Dashboard\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\App\Dashboard\Action\DashboardContentAction;
use Nemundo\Content\App\Dashboard\Application\DashboardApplication;
use Nemundo\Content\App\Dashboard\Content\Dashboard\DashboardContentType;
use Nemundo\Content\App\Dashboard\Content\DashboardColumn\DashboardColumnContentType;
use Nemundo\Content\App\Dashboard\Content\DashboardContentTypeCollection;
use Nemundo\Content\App\Dashboard\Content\UserDashboard\UserDashboardContentType;
use Nemundo\Content\App\Dashboard\Data\DashboardModelCollection;
use Nemundo\Content\App\Dashboard\Script\DashboardCleanScript;
use Nemundo\Content\App\Dashboard\Usergroup\DashboardUsergroup;
use Nemundo\Content\Application\ContentApplication;
use Nemundo\Content\Index\Tree\Setup\RestrictedContentTypeSetup;
use Nemundo\Content\Setup\ContentActionSetup;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\User\Setup\UsergroupSetup;


class DashboardInstall extends AbstractInstall
{

    public function install()
    {

        (new ContentApplication())->setAppMenuActive();

        (new ApplicationSetup())
            ->addApplication(new DashboardApplication());

        (new ModelCollectionSetup())
            ->addCollection(new DashboardModelCollection());

        (new ScriptSetup(new DashboardApplication()))
            ->addScript(new DashboardCleanScript());

        (new UsergroupSetup())
            ->addUsergroup(new DashboardUsergroup());

        (new ContentTypeSetup(new DashboardApplication()))
            ->addContentTypeCollection(new DashboardContentTypeCollection());

        (new RestrictedContentTypeSetup(new DashboardContentType()))
            ->addRestrictedContentType(new DashboardColumnContentType());

        (new RestrictedContentTypeSetup(new UserDashboardContentType()))
            ->addRestrictedContentType(new DashboardColumnContentType());


        (new ContentActionSetup())
            ->addContentAction(new DashboardContentAction());


    }

}