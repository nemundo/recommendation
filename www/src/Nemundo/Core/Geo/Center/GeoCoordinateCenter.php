<?php


namespace Nemundo\Core\Geo\Center;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Math\NumberDirectory;
use Nemundo\Core\Type\Geo\AbstractGeoCoordinate;
use Nemundo\Core\Type\Geo\GeoCoordinate;


class GeoCoordinateCenter extends AbstractBase
{

    /**
     * @var GeoCoordinate[]
     */
    private $coordinateList = [];

    public function addCoordinate(AbstractGeoCoordinate $geoCoordinate)
    {

        $this->coordinateList[] = $geoCoordinate;
        return $this;

    }


    public function getCenter()
    {

        $center = new GeoCoordinate();

        if (sizeof($this->coordinateList) > 0) {

            $latList = new NumberDirectory();
            $lonList = new NumberDirectory();

            foreach ($this->coordinateList as $geoCoordinate) {

                $latList->addValue($geoCoordinate->latitude);
                $lonList->addValue($geoCoordinate->longitude);

            }

            $center->latitude = $latList->getMedian();
            $center->longitude = $lonList->getMedian();

        }

        return $center;

    }

}