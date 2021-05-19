<?php

namespace Nemundo\Geo\Kml\Object;


use Nemundo\Core\Type\Geo\GeoCoordinateAltitude;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Geo\Kml\Container\Placemark;
use Nemundo\Geo\Kml\Element\Point;
use Nemundo\Geo\Kml\Property\HtmlDescription;
use Nemundo\Geo\Kml\Property\Name;
use Nemundo\Geo\Kml\Property\StyleUrl;
use Nemundo\Html\Character\HtmlCharacter;


class KmlMarker extends Placemark
{

    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $description;

    /**
     * @var GeoCoordinateAltitude
     */
    public $coordinate;

    public $styleUrl;


    public function getContent()
    {

        //<styleUrl>#exampleStyleMap</styleUrl>
        if ($this->styleUrl!==null) {
            $styleUrl = new StyleUrl($this);
            $styleUrl->value='#'.$this->styleUrl;
        }


        if ($this->description !== null) {
            $description = new HtmlDescription($this);
            $description->value = $this->description;
        }

        if ($this->coordinate!==null) {
        $point = new Point($this);
        $point->coordinate = $this->coordinate;
        }

        return parent::getContent();

    }


/*
    private function replaceText($text) {

        return (new Text($text))
            ->replace('&',HtmlCharacter::AMPERSAND)  //HtmlCharacter::AMPERSAND)
            ->getValue();

    }*/

    /*
<Placemark>
     <styleUrl>#exampleStyleMap</styleUrl>
<name>Ein Punkt im Nichts</name>
<description>
<![CDATA[
<a href="#pm1;balloon">Klick To Open</a>
]]>
</description>
<Point>
<coordinates>
7.14986,51.71342,0
</coordinates>
</Point>
</Placemark>
*/

}