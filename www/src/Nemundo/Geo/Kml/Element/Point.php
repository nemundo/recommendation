<?php

namespace Nemundo\Geo\Kml\Element;


use Nemundo\Core\Type\Geo\GeoCoordinateAltitude;
use Nemundo\Geo\Kml\Property\Coordinates;
use Nemundo\Html\Container\AbstractTagContainer;

class Point extends AbstractTagContainer
{

    /**
     * @var GeoCoordinateAltitude
     */
    public $coordinate;

    public function getContent()
    {

        $this->tagName = 'Point';

        $coordinates = new Coordinates($this);
        $coordinates->coordinate = $this->coordinate;

        return parent::getContent();

    }

}