<?php

namespace Nemundo\Content\App\Message\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Message\Application\MessageApplication;
use Nemundo\Content\App\Message\Content\Message\MessageContentType;
use Nemundo\Content\App\Message\Data\MessageModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class MessageInstall extends AbstractInstall
{
    public function install()
    {
        (new ApplicationSetup())->addApplication(new MessageApplication());

        (new ModelCollectionSetup())->addCollection(new MessageModelCollection());

        (new ContentTypeSetup())
            ->addContentType(new MessageContentType());

    }
}