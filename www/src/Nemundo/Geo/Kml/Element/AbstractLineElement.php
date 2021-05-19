<?php

namespace Nemundo\Geo\Kml\Element;


use Nemundo\Core\Type\Geo\AbstractGeoCoordinateAltitude;
use Nemundo\Geo\Kml\Property\AltitudeMode\AltitudeMode;
use Nemundo\Geo\Kml\Property\AltitudeMode\AltitudeModeProperty;
use Nemundo\Geo\Kml\Property\Extrude;
use Nemundo\Geo\Kml\Property\Tessellate;
use Nemundo\Html\Container\AbstractTagContainer;
use Nemundo\Html\Container\TagContainer;

abstract class AbstractLineElement extends AbstractTagContainer
{

    public $altitudeMode = AltitudeMode::ABSOLUTE;

    /**
     * @var bool
     */
    public $extrude = false;


    /**
     * @var string
     */
    public $coordinateText = '';


    //public function addPoint(GeoCoordinateAltitude $coordinate)
    public function addPoint(AbstractGeoCoordinateAltitude $coordinate)
    {

        $longitude = round($coordinate->longitude, 5);
        $latitude = round($coordinate->latitude, 5);
        //$this->coordinateText .= $longitude . ',' . $latitude . PHP_EOL;
        $this->coordinateText .= $longitude . ',' . $latitude . ',' . $coordinate->altitude . PHP_EOL;

        return $this;

    }


    public function getCoordinateContent()
    {

        return $this->coordinateText;

    }


    public function getContent()
    {

        //$this->tagName = 'LineString';

        $tag = new AltitudeModeProperty($this);
        $tag->value = $this->altitudeMode;

        if ($this->extrude) {
            $tag = new Extrude($this);
            $tag->value = '1';
        }


        $tag = new Tessellate($this);
        $tag->value = '1';

        //  <tessellate>1</tessellate>

        $coordinates = new TagContainer($this);
        $coordinates->tagName = 'coordinates';
        $coordinates->addContent($this->coordinateText);

        return parent::getContent();

    }

}