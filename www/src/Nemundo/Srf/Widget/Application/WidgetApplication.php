<?php

namespace Nemundo\Srf\Widget\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Srf\Widget\Data\WidgetCollection;

class WidgetApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'SRF Widget';
        $this->applicationId = 'e06c9268-8322-4197-9c28-df4e19fbb24b';
        $this->modelCollectionClass = WidgetCollection::class;
    }
}