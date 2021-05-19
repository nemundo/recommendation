<?php

namespace Nemundo\Content\App\Text\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Text\Data\TextModelCollection;
use Nemundo\Content\App\Text\Install\TextInstall;
use Nemundo\Content\App\Text\Install\TextUninstall;
use Nemundo\Package\CkEditor5\CkEditor5Package;

class TextApplication extends AbstractApplication
{
    protected function loadApplication()
    {

        $this->application = 'Text';
        $this->applicationId = '4f979136-8c34-445e-acc6-37f7b82d3673';
        $this->modelCollectionClass = TextModelCollection::class;
        $this->installClass = TextInstall::class;
        $this->uninstallClass = TextUninstall::class;

        $this->addPackage(new CkEditor5Package());

    }
}