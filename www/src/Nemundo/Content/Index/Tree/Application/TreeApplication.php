<?php

namespace Nemundo\Content\Index\Tree\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\ContentProject;
use Nemundo\Content\Index\Tree\Data\TreeModelCollection;
use Nemundo\Content\Index\Tree\Install\TreeInstall;
use Nemundo\Content\Index\Tree\Site\Admin\TreeAdminSite;
use Nemundo\Content\Index\Tree\Site\TreeSite;

class TreeApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->project = new ContentProject();
        $this->application = 'Tree';
        $this->applicationId = 'fa2aff01-5c1d-4aa0-89b1-23de36ea6230';
        $this->modelCollectionClass = TreeModelCollection::class;
        $this->installClass = TreeInstall::class;
        $this->appSiteClass = TreeSite::class;
        $this->adminSiteClass = TreeAdminSite::class;
    }
}