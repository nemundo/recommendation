<?php

namespace Nemundo\Content\App\Map\Site;

use Nemundo\Content\App\Map\Content\Route\RouteContentType;
use Nemundo\Content\App\Map\Data\RouteCoordinate\RouteCoordinateReader;
use Nemundo\Content\App\Map\Parameter\RouteParameter;
use Nemundo\Content\App\Map\Kml\RouteKmlLine;
use Nemundo\Geo\Kml\Document\KmlDocument;
use Nemundo\Geo\Kml\Object\KmlLine;
use Nemundo\Geo\Kml\Site\AbstractKmlSite;
use Nemundo\Package\FontAwesome\Site\AbstractKmlIconSite;

class RouteKmlSite extends AbstractKmlSite
{

    /**
     * @var RouteKmlSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Route Kml';
        $this->url = 'routekml';
        RouteKmlSite::$site = $this;
    }

    public function loadContent()
    {

        $kml = new KmlDocument();


        (new RouteParameter())->getRouteContent()->getKmlMarker($kml);



        /*$line = new KmlLine($kml);
        $line->color = 'FF1400FF';*/




        //$line->width = 10;
       // $line->



        /*
        $routeId = (new RouteParameter())->getValue();




        $line=new RouteKmlLine($kml);
        $line->routeRow=(new RouteContentType($routeId))->getDataRow();*/


        /*
        $line->label =  (new RouteContentType($routeId))->getSubject();



        $reader = new RouteCoordinateReader();
        $reader->filter->andEqual($reader->model->routeId, $routeId);
        $reader->addOrder($reader->model->id);
        foreach ($reader->getData() as $coordinateRow) {


            $coordinate = clone($coordinateRow->geoCoordinate);
            //$coordinate->altitude = $coordinate->altitude + 100;

            $line->addPoint($coordinate);

        }*/

        $kml->render();

    }
}