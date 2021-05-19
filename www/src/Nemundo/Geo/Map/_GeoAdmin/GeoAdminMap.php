<?php


// namespace Nemundo\Geo\Map\Swiss;
namespace Nemundo\Geo\Map\GeoAdmin;


//https://api3.geo.admin.ch/api/quickstart.html


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\Style\DimensionStyle;
use Nemundo\Com\Style\DimensionUnit;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Package\Jquery\Package\JqueryPackage;


// AbstractMap

// SwissMap
class GeoAdminMap extends AbstractHtmlContainer
{

    use LibraryTrait;

    /**
     * @var int
     */
    public $zoom;

    public $resolution = 500;

    /**
     * @var DimensionStyle
     */
    public $dimension;

    /**
     * @var GeoCoordinate
     */
    public $mapCenter;

    private $layer = [];

    private $kmlLayer = [];


    public function loadContainer()
    {

        parent::loadContainer();
        $this->dimension = new DimensionStyle();
        $this->dimension->width = 100;
        $this->dimension->widthUnit = DimensionUnit::PERCENT;
        $this->dimension->height = 1000;
        $this->dimension->heightUnit = DimensionUnit::PIXEL;


    }

    public function addLayer($layer)
    {
        $this->layer[] = $layer;
        return $this;
    }


    public function addKmlLayer($url)
    {
        $this->kmlLayer[] = $url;
        return $this;
    }


    public function getContent()
    {

        $this->tagName = 'div';
        $this->id = 'map';
        $this->addAttribute('style', $this->dimension->getStyle());
        //$this->addAttribute('style', 'height: 600px;width: 100%;');
        //$this->addAttribute('style', 'height: 100%;width: 100%;');

        $this->addPackage(new JqueryPackage());
        $this->addJsUrl('https://api3.geo.admin.ch/loader.js');
        //$this->addJsUrl('http://api3.geo.admin.ch/loader.js?lang=en');


        //$this->addJavaScript('var coordinate = ol.proj.fromLonLat([13.689167, 47.394167]);');


        //  var schladming = [13.689167, 47.394167]; // longitude first, then latitude
// since we are using OSM, we have to transform the coordinates...
        //  var schladmingWebMercator = ol.proj.fromLonLat(schladming);


        //$this->addJqueryScript('var layer = ga.layer.create("ch.swisstopo.pixelkarte-farbe");');
        //$this->addJqueryScript('var layer = ga.layer.create("' . $this->mapType . '");');

        //$this->addJqueryScript('var layer2 = ga.layer.create("ch.bav.haltestellen-oev");');

        //$this->addJqueryScript('var layer3 = ga.layer.create("' . GeoAdminMapType::ICAO . '");');


        $number = 0;
        $layerList = new TextDirectory();
        foreach ($this->layer as $layer) {
            $variableName = 'layer' . $number;
            $this->addJqueryScript('var ' . $variableName . ' = ga.layer.create("' . $layer . '");');
            $layerList->addValue($variableName);
            $number++;
        }


        $this->addJqueryScript('var map = new ga.Map({');
        $this->addJqueryScript('target: "map",');



        $this->addJqueryScript('layers: [' . $layerList->getTextWithSeperator(',') . '],');

        $this->addJqueryScript('view: new ol.View({');
        $this->addJqueryScript('resolution: ' . $this->resolution . ',');

        if ($this->zoom !==null) {
            $this->addJqueryScript('zoom: '.$this->zoom.'');
        }

        if ($this->mapCenter !==null) {
        //$this->addJqueryScript('center: coordinate');

        //$this->addJqueryScript('center: [670000, 160000]');
            $this->addJqueryScript('center: ['.$this->mapCenter->getText().'],');

        }

         /*
        if ($this->mapCenter!==null) {
        $this->addJqueryScript('center: ol.proj.fromLonLat(['.$this->mapCenter->getText().'],8)');
        }*/

        $this->addJqueryScript('})');
        $this->addJqueryScript('});');

        //$this->addJqueryScript('map.geocode("bergruh1, dallenwil");');


        foreach ($this->kmlLayer as $kmlLayer) {
            $this->addJqueryScript('var vector = new ol.layer.Vector({');
            $this->addJqueryScript('source: new ol.source.Vector({');
            $this->addJqueryScript('url: "' . $kmlLayer . '",');
            $this->addJqueryScript('format : new ol.format.KML({');
            $this->addJqueryScript('projection: "EPSG:21781"');
            $this->addJqueryScript('})');
            $this->addJqueryScript('})');
            $this->addJqueryScript('});');
            $this->addJqueryScript('map.addLayer(vector);');
        }

        //$this->addJqueryScript('map.setZoom(10);');

        // kml
        // https://codepen.io/geoadmin/pen/eJqBVV?editors=0010

        return parent::getContent();
    }

}