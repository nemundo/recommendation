<?php

namespace Nemundo\Content\App\Location\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Location\Install\LocationInstall;

class LocationApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Location';
        $this->applicationId = '4cf9e50a-0a4e-4b68-b9e0-e214ba78745e';
        $this->installClass=LocationInstall::class;
    }
}