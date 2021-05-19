<?php

namespace Nemundo\Content\App\Message\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Message\Data\MessageModelCollection;

class MessageApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Message';
        $this->applicationId = 'd7c18e4f-a968-41c6-9f44-07813c5bd8f5';
        $this->modelCollectionClass = MessageModelCollection::class;
    }
}