<?php


namespace Nemundo\Geo\Gpx\Reader;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Geo\GeoCoordinateAltitude;

class GpxWaypoint extends AbstractBase
{

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $url;

    /**
     * @var GeoCoordinateAltitude
     */
    public $coordinate;

}