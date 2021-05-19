<?php

namespace Nemundo\Content\Index\Log\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\Index\Log\Application\LogApplication;
use Nemundo\Content\Index\Log\Data\LogModelCollection;
use Nemundo\Content\Index\Log\Type\CreateLogContentType;
use Nemundo\Content\Index\Log\Type\DeleteLogContentType;
use Nemundo\Content\Index\Log\Type\ModifiedLogContentType;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class LogInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new LogApplication());

        (new ModelCollectionSetup())
            ->addCollection(new LogModelCollection());

        (new ContentTypeSetup())
            ->addContentType(new CreateLogContentType())
            ->addContentType(new ModifiedLogContentType())
            ->addContentType(new DeleteLogContentType());


    }
}