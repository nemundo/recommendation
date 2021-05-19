<?php

namespace Nemundo\Content\App\ToDo\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Content\App\ToDo\Application\ToDoApplication;
use Nemundo\Content\App\ToDo\Content\Cancel\CancelContentType;
use Nemundo\Content\App\ToDo\Content\Done\DoneContentType;
use Nemundo\Content\App\ToDo\Content\ToDo\ToDoContentType;
use Nemundo\Content\App\ToDo\Content\ToDoContainer\ToDoContainerContentType;
use Nemundo\Content\App\ToDo\Data\ToDoModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;

class ToDoInstall extends AbstractInstall
{
    public function install()
    {
        (new ApplicationSetup())->addApplication(new ToDoApplication());
        (new ModelCollectionSetup())->addCollection(new ToDoModelCollection());

        (new ContentTypeSetup(new ToDoApplication()))
            ->addContentType(new ToDoContentType())
            //->addContentType(new DoneContentType())
            //->addContentType(new CancelContentType())
            ->addContentType(new ToDoContainerContentType());

    }
}