<?php

namespace Nemundo\Content\App\Map\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Map\Application\MapApplication;
use Nemundo\Content\App\Map\Content\GoogleMaps\GoogleMapsContentType;
use Nemundo\Content\App\Map\Content\Route\RouteContentType;

use Nemundo\Content\App\Map\Data\MapModelCollection;
use Nemundo\Content\Index\Geo\Setup\GeoContentTypeSetup;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class MapInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new MapApplication());

        (new ModelCollectionSetup())
            ->addCollection(new MapModelCollection());

        (new GeoContentTypeSetup(new MapApplication()))
            ->addContentType(new RouteContentType());
            //->addContentType(new GoogleMapsContentType());

        //    ->addContentType(new SwissMapContentType());


    }
}