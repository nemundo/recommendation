<?php

namespace Nemundo\App\DbAdmin\Application;


use Nemundo\App\Application\Type\AbstractApplication;

class DbAdminApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->application = 'Db Admin';
        $this->applicationId = 'fd195901-8eae-4a7c-80c4-242d171bb5dd';
    }

}