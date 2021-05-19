<?php

namespace Nemundo\Content\App\Widget\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Widget\Install\WidgetInstall;

class WidgetApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Widget';
        $this->applicationId = 'c7c63582-b6e6-49de-93fe-b2ec59917c04';
        $this->installClass = WidgetInstall::class;
    }
}