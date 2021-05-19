<?php

namespace Nemundo\Content\App\Layout\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Content\App\Layout\Application\LayoutApplication;
use Nemundo\Content\App\Layout\Content\LayoutColumn\LayoutColumnContentType;
use Nemundo\Content\App\Layout\Data\LayoutModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;

class LayoutInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new LayoutApplication());


        (new ModelCollectionSetup())
            ->addCollection(new LayoutModelCollection());

        (new ContentTypeSetup(new LayoutApplication()))
            ->addContentType(new LayoutColumnContentType());

    }
}