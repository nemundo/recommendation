<?php

namespace Nemundo\Srf\Widget\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Srf\Widget\Application\WidgetApplication;
use Nemundo\Srf\Widget\Content\ShowWidget\ShowWidgetContentType;
use Nemundo\Srf\Widget\Data\WidgetCollection;

class WidgetInstall extends AbstractInstall
{
    public function install()
    {
        (new ApplicationSetup())->addApplication(new WidgetApplication());
        (new ModelCollectionSetup())->addCollection(new WidgetCollection());

        (new ContentTypeSetup())
            ->addContentType(new ShowWidgetContentType());


    }
}