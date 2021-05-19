<?php

namespace Nemundo\Geo\Gpx\Reader;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Type\Geo\GeoCoordinateAltitude;
use Nemundo\Core\Xml\Reader\XmlReader;


// GpxTrackReader
class GpxWaypointReader extends AbstractDataSource
{

    /**
     * @var string
     */
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }


    /**
     * @return GpxWaypoint[]
     */
    public function getData()
    {
        return parent::getData();
    }


    protected function loadData()
    {

        /*
        if (!$this->checkProperty('filename')) {
            return;
        }*/

        $xmlReader = new XmlReader();
        $xmlReader->filename = $this->filename;

        foreach ($xmlReader->getData()['wpt'] as $row) {

            $coordinate = new GeoCoordinateAltitude();
            $coordinate->latitude = $row['@attributes']['lat'];
            $coordinate->longitude = $row['@attributes']['lon'];
            $coordinate->altitude = $row['ele'];

            $waypoint=new GpxWaypoint();
            $waypoint->name =$row['name'];

            if (isset($row['desc'])) {
                $waypoint->description = $row['desc'];
            }

            if (isset($row['link'])) {
                $waypoint->description = $row['link'];
            }

            //<desc>Abendberg, GS, NW</desc>
		//<link

            $waypoint->coordinate=$coordinate;

            $this->addItem($waypoint);

        }

    }



    public function getWaypointList() {





    }

}