<?php

namespace Nemundo\Model\Filter;


use Nemundo\Core\Geo\Addition\GeoCoordinateAddition;
use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Db\Filter\AbstractFilter;
use Nemundo\Db\Filter\Filter;
use Nemundo\Model\Type\Geo\GeoCoordinateType;

class GeoCoordinateSquareFilter extends AbstractFilter
{

    /**
     * @var int
     */
    public $distanceInKilometres;

    /**
     * @var GeoCoordinate
     */
    public $coordinateCenter;

    /**
     * @var GeoCoordinateType
     */
    public $coordinateType;



    public function __construct()
    {

        parent::__construct();
        $this->coordinateCenter=new GeoCoordinate();

    }


    protected function loadFilter()
    {
        // TODO: Implement loadFilter() method.
    }


    public function isNotEmpty()
    {
        return true;
    }


    public function getSqlStatement()
    {

        $newCoordinate = (new GeoCoordinateAddition($this->coordinateCenter))->addDistance($this->distanceInKilometres);
        $this->andSmaller($this->coordinateType->latitude, $newCoordinate->latitude);
        $this->andSmaller($this->coordinateType->longitude, $newCoordinate->longitude);

        $newCoordinate = (new GeoCoordinateAddition($this->coordinateCenter))->addDistance($this->distanceInKilometres * (-1));
        $this->andGreater($this->coordinateType->latitude, $newCoordinate->latitude);
        $this->andGreater($this->coordinateType->longitude, $newCoordinate->longitude);

        return parent::getSqlStatement();

    }

}