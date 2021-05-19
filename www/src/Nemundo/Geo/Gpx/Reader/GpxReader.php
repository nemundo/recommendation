<?php

namespace Nemundo\Geo\Gpx\Reader;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Type\Geo\GeoCoordinateAltitude;
use Nemundo\Core\Xml\Reader\XmlReader;


// GpxTrackReader
class GpxReader extends AbstractDataSource
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
     * @return GeoCoordinateAltitude[]
     */
    public function getData()
    {
        return parent::getData();
    }


    protected function loadData()
    {

        $xmlReader = new XmlReader();
        $xmlReader->filename = $this->filename;

        foreach ($xmlReader->getData()['trk']['trkseg']['trkpt'] as $row) {

            $coordinate = new GeoCoordinateAltitude();
            $coordinate->latitude = $row['@attributes']['lat'];
            $coordinate->longitude = $row['@attributes']['lon'];
            if (isset($row['ele'])) {
                $coordinate->altitude = $row['ele'];
            }
            $this->addItem($coordinate);

        }

    }

}