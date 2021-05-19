<?php

namespace Nemundo\Content\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\ContentProject;
use Nemundo\Content\Data\ContentModelCollection;
use Nemundo\Content\Install\ContentInstall;
use Nemundo\Content\Site\Admin\ContentAdminSite;
use Nemundo\Content\Site\ContentSite;
use Nemundo\Package\Jquery\Package\JqueryPackage;
use Nemundo\Package\JqueryUi\JqueryUiPackage;

class ContentApplication extends AbstractApplication
{
    protected function loadApplication()
    {

        $this->project = new ContentProject();
        $this->application = 'Content';
        $this->applicationId = '8d20d52d-8b53-473d-a273-112c9a8638d9';
        $this->modelCollectionClass = ContentModelCollection::class;
        $this->installClass = ContentInstall::class;
        $this->appSiteClass = ContentSite::class;
        $this->adminSiteClass = ContentAdminSite::class;

        $this->addPackage(new JqueryPackage());
        $this->addPackage(new JqueryUiPackage());

    }
}