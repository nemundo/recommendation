<?php


namespace Nemundo\Content\Index\Geo\Kml;


use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Geo\Kml\Object\KmlLine;
use Nemundo\Geo\Kml\Object\KmlMarker;

class ContentKmlLine extends KmlLine
{

    /**
     * @var AbstractContentType
     */
    public $content;

}