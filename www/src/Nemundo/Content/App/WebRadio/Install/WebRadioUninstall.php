<?php

namespace Nemundo\Content\App\WebRadio\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Content\App\WebRadio\Application\WebRadioApplication;
use Nemundo\Content\App\WebRadio\Content\WebRadio\WebRadioContentType;
use Nemundo\Content\App\WebRadio\Data\WebRadioModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class WebRadioUninstall extends AbstractUninstall
{
    public function uninstall()
    {

        (new ContentTypeSetup(new WebRadioApplication()))
            ->removeContent(new WebRadioContentType());

        (new ModelCollectionSetup())
            ->removeCollection(new WebRadioModelCollection());



    }
}