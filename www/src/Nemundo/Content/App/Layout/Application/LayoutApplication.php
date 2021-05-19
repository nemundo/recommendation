<?php

namespace Nemundo\Content\App\Layout\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Layout\Install\LayoutInstall;

class LayoutApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Layout';
        $this->applicationId = '7ac07ba5-a7f0-458b-bf1a-c382b401be37';
        $this->installClass = LayoutInstall::class;
    }
}