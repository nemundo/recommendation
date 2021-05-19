<?php


namespace Nemundo\Content\App\Map\Kml;


use Nemundo\Content\App\Map\Data\Route\RouteRow;
use Nemundo\Content\App\Map\Data\RouteCoordinate\RouteCoordinateReader;
use Nemundo\Geo\Kml\Object\KmlLine;

class RouteKmlLine extends KmlLine
{

    /**
     * @var RouteRow
     */
    public $routeRow;

    public function getContent()
    {

        $this->color = 'FF1400FF';
        $this->width = 10;
        $this->label = $this->routeRow->route;

        $reader = new RouteCoordinateReader();
        $reader->filter->andEqual($reader->model->routeId, $this->routeRow->id);
        $reader->addOrder($reader->model->id);
        foreach ($reader->getData() as $coordinateRow) {
            $coordinate = clone($coordinateRow->geoCoordinate);
            $this->addPoint($coordinate);
        }

        return parent::getContent();

    }

}