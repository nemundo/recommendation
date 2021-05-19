<?php

namespace Nemundo\Content\App\Translation\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Translation\Data\TranslationModelCollection;
use Nemundo\Content\App\Translation\Install\TranslationInstall;
use Nemundo\Content\App\Translation\Install\TranslationUninstall;
use Nemundo\Content\App\Translation\Site\TranslationSite;

class TranslationApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Translation (Content)';
        $this->applicationId = 'edf8f21f-2b93-4faa-913d-b04123262e23';
        $this->modelCollectionClass = TranslationModelCollection::class;
        $this->installClass = TranslationInstall::class;
        $this->uninstallClass = TranslationUninstall::class;
        $this->appSiteClass = TranslationSite::class;
    }
}