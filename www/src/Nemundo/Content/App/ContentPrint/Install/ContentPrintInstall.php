<?php

namespace Nemundo\Content\App\ContentPrint\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\ContentPrint\Action\ContentPrintContentAction;
use Nemundo\Content\App\ContentPrint\Application\ContentPrintApplication;
use Nemundo\Content\App\ContentPrint\Data\PrintModelCollection;
use Nemundo\Content\Setup\ContentActionSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class ContentPrintInstall extends AbstractInstall
{
    public function install()
    {

        (new ContentActionSetup())
            ->addContentAction(new ContentPrintContentAction());

    }
}