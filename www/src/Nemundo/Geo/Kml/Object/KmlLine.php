<?php

namespace Nemundo\Geo\Kml\Object;


use Nemundo\Core\Type\Geo\AbstractGeoCoordinate;
use Nemundo\Geo\Kml\Container\Placemark;
use Nemundo\Geo\Kml\Element\LineString;
use Nemundo\Geo\Kml\Property\AltitudeMode\AltitudeMode;
use Nemundo\Geo\Kml\Property\Color;
use Nemundo\Geo\Kml\Property\Width;
use Nemundo\Geo\Kml\Style\LineStyle;
use Nemundo\Geo\Kml\Style\Style;


// LinePlacemark
class KmlLine extends Placemark  // AbstractKmlElement
{

    /**
     * @var int
     */
    public $width;

    /**
     * @var string
     */
    public $color;

    /**
     * @var string
     */
    public $altitudeMode;

    /**
     * @var LineString
     */
    private $lineString = AltitudeMode::CLAMP_TO_GROUND;


    protected function loadContainer()
    {

        parent::loadContainer();
        $this->lineString = new LineString($this);
        //$this->lineString->altitudeMode = AltitudeMode::CLAMP_TO_GROUND;

    }


    //public function addPoint(GeoCoordinateAltitude $coordinate)
    public function addPoint(AbstractGeoCoordinate $coordinate)
    {

        $this->lineString->addPoint($coordinate);
        return $this;

    }


    public function getContent()
    {

        $style = new Style($this);

        $lineStyle = new LineStyle($style);

        if ($this->color !== null) {
            $color = new Color($lineStyle);
            $color->value = $this->color;
        }

        if ($this->width !== null) {
            $width = new Width($lineStyle);
            $width->value = $this->width;
        }

        $this->lineString->altitudeMode = $this->altitudeMode;

        return parent::getContent();

    }

}