<?php

namespace Nemundo\Content\App\SystemLog\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\SystemLog\Install\SystemLogInstall;

class SystemLogApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'SystemLog';
        $this->applicationId = '7c7efe01-1b44-498d-bf79-c7113d95a7c7';
        $this->installClass = SystemLogInstall::class;
    }
}