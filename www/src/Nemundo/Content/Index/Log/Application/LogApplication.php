<?php

namespace Nemundo\Content\Index\Log\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\Index\Log\Data\LogModelCollection;

class LogApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Content Log';
        $this->applicationId = '5aed47cf-6111-4b7d-a9ed-dfcef23bfc3c';
        $this->modelCollectionClass=LogModelCollection::class;
    }
}