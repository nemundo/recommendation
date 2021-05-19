<?php

namespace Nemundo\Content\App\Listing\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Listing\Application\ListingApplication;
use Nemundo\Content\App\Listing\Content\Listing\ListingContentType;
use Nemundo\Content\App\Listing\Data\ListingCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;


class ListingInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())->addApplication(new ListingApplication());
        (new ModelCollectionSetup())->addCollection(new ListingCollection());

        (new ContentTypeSetup(new ListingApplication()))
            ->addContentType(new ListingContentType());

    }
}