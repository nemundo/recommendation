<?php

namespace Nemundo\Content\App\ContentPrint\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\ContentPrint\Install\ContentPrintInstall;
use Nemundo\Content\App\ContentPrint\Install\ContentPrintUninstall;
use Nemundo\Content\App\ContentPrint\Site\ContentPrintSite;

class ContentPrintApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Content Print';
        $this->applicationId = '666229aa-a158-4b94-8058-79d2a52c496c';
        $this->installClass = ContentPrintInstall::class;
        $this->uninstallClass = ContentPrintUninstall::class;
        $this->appSiteClass = ContentPrintSite::class;

    }
}