<?php

namespace Nemundo\Content\App\Website\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Website\Application\WebsiteApplication;
use Nemundo\Content\App\Website\Content\Webpage\WebpageContentType;
use Nemundo\Content\App\Website\Content\Website\WebsiteContentType;
use Nemundo\Content\App\Website\Data\WebsiteModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class WebsiteInstall extends AbstractInstall
{
    public function install()
    {
        (new ApplicationSetup())->addApplication(new WebsiteApplication());
        (new ModelCollectionSetup())->addCollection(new WebsiteModelCollection());

        (new ContentTypeSetup(new WebsiteApplication()))
            ->addContentType(new WebsiteContentType())
            ->addContentType(new WebpageContentType());


    }
}