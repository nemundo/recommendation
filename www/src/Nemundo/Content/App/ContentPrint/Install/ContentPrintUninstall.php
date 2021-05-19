<?php

namespace Nemundo\Content\App\ContentPrint\Install;

use Nemundo\Content\App\ContentPrint\Action\ContentPrintContentAction;
use Nemundo\Content\Setup\ContentActionSetup;
use Nemundo\App\Application\Type\Install\AbstractUninstall;

class ContentPrintUninstall extends AbstractUninstall
{
    public function uninstall()
    {

        (new ContentActionSetup())
            ->removeContentAction(new ContentPrintContentAction());

    }
}