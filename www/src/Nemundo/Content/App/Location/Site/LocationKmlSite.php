<?php

namespace Nemundo\Content\App\Location\Site;

use Nemundo\Content\App\Location\Data\Location\LocationReader;
use Nemundo\Content\App\Location\Parameter\LocationParameter;
use Nemundo\Geo\Kml\Document\KmlDocument;
use Nemundo\Geo\Kml\Object\KmlMarker;
use Nemundo\Package\FontAwesome\Site\AbstractKmlIconSite;

class LocationKmlSite extends AbstractKmlIconSite
{

    /**
     * @var LocationKmlSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'LocationKml';
        $this->url = 'location-kml';
        LocationKmlSite::$site=$this;
    }

    public function loadContent()
    {

        $locationId=(new LocationParameter())->getValue();
        $locationRow=(new LocationReader())->getRowById($locationId);

        $kml=new KmlDocument();

        $marker=new KmlMarker($kml);
        $marker->label=$locationRow->location;
        $marker->description=$locationRow->description;
        $marker->coordinate=$locationRow->geoCoordinate;

        $kml->render();

    }
}