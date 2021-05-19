<?php

namespace Nemundo\Content\App\UserProfile\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\UserProfile\Application\UserProfileApplication;
use Nemundo\Content\App\UserProfile\Content\UserProfile\UserProfileContentType;
use Nemundo\Content\App\UserProfile\Data\UserProfileModelCollection;
use Nemundo\Content\App\UserProfile\Usergroup\DefaultUsergroup;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\User\Setup\UsergroupSetup;

class UserProfileInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new UserProfileApplication());

        (new ModelCollectionSetup())
            ->addCollection(new UserProfileModelCollection());

        (new UsergroupSetup())
            ->addUsergroup(new DefaultUsergroup());

        (new ContentTypeSetup(new UserProfileApplication()))
            ->addContentType(new UserProfileContentType());

    }
}