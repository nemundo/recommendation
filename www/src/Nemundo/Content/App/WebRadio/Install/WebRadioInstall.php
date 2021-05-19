<?php

namespace Nemundo\Content\App\WebRadio\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\WebRadio\Application\WebRadioApplication;
use Nemundo\Content\App\WebRadio\Content\WebRadio\WebRadioContentType;
use Nemundo\Content\App\WebRadio\Data\WebRadioModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class WebRadioInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new WebRadioApplication());

        (new ModelCollectionSetup())
            ->addCollection(new WebRadioModelCollection());

        (new ContentTypeSetup(new WebRadioApplication()))
            ->addContentType(new WebRadioContentType());

    }
}