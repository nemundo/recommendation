<?php

namespace Hackathon\Application;

use Hackathon\Data\HackathonModelCollection;
use Hackathon\HackathonProject;
use Hackathon\Install\HackathonInstall;
use Nemundo\App\Application\Type\AbstractApplication;

class HackathonApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->project=new HackathonProject();
        $this->application = 'Hackathon';
        $this->applicationId = '5739b8e8-fc63-4b44-99ff-4de7d7751e02';
        $this->installClass = HackathonInstall::class;
        $this->modelCollectionClass=HackathonModelCollection::class;
    }
}