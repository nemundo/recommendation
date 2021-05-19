<?php


namespace Nemundo\Content\App\Map\Content\Route;


use Nemundo\Content\App\Map\Data\RouteCoordinate\RouteCoordinateReader;
use Nemundo\Content\Index\Geo\Kml\ContentKmlLine;

class RouteContentKmlLine extends ContentKmlLine
{

    /**
     * @var RouteContentType
     */
    public $content;

    public function getContent()
    {

        $routeRow = $this->content->getDataRow();
        $this->label = $routeRow->route;
        $this->color = $routeRow->color;
        $this->width = 10;

        $reader = new RouteCoordinateReader();
        $reader->filter->andEqual($reader->model->routeId, $routeRow->id);
        $reader->addOrder($reader->model->id);
        foreach ($reader->getData() as $coordinateRow) {
            $coordinate = clone($coordinateRow->geoCoordinate);
            $this->addPoint($coordinate);
        }

        return parent::getContent();

    }

}