<?php


namespace Nemundo\Content\App\Map\Com\Chart;


use Nemundo\Com\Chart\Data\LineChartData;
use Nemundo\Content\App\Map\Data\RouteCoordinate\RouteCoordinateReader;
use Nemundo\Package\Echarts\Chart\AbstractEchart;

class ElevationProfileChart extends AbstractEchart
{

    public $routeId;

    public function getContent()
    {


        $line = new LineChartData($this);
        $n = 0;
        $reader = new RouteCoordinateReader();
        $reader->filter->andEqual($reader->model->routeId, $this->routeId);
        $reader->addOrder($reader->model->id);
        foreach ($reader->getData() as $coordinateRow) {
            $line->addValue($coordinateRow->geoCoordinate->altitude);
            $this->addXAxisLabel($n);
            $n++;

        }

        return parent::getContent();

    }

}