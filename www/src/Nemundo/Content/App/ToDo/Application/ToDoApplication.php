<?php

namespace Nemundo\Content\App\ToDo\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\ToDo\Data\ToDoModelCollection;
use Nemundo\Content\App\ToDo\Install\ToDoInstall;

class ToDoApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'ToDo';
        $this->applicationId = '92db70f8-6790-495c-8aa8-86a86e338a70';
        $this->modelCollectionClass=ToDoModelCollection::class;
        $this->installClass = ToDoInstall::class;
    }
}