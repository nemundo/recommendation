<?php

namespace Nemundo\Content\App\Project\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Project\Application\ProjectApplication;
use Nemundo\Content\App\Project\Content\Project\ProjectContentType;
use Nemundo\Content\App\Project\Content\ProjectPhase\ProjectPhaseContentType;
use Nemundo\Content\App\Project\Data\ProjectModelCollection;
use Nemundo\Content\Index\Group\Setup\GroupSetup;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class ProjectInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new ProjectApplication());

        (new ModelCollectionSetup())
            ->addCollection(new ProjectModelCollection());

        (new ContentTypeSetup(new ProjectApplication()))
            ->addContentType(new ProjectContentType())
            ->addContentType(new ProjectPhaseContentType());

        (new GroupSetup())
            ->addGroupType(new ProjectContentType());


    }
}