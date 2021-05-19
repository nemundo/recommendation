<?php

namespace Nemundo\Geo\Map\GoogleMaps;

use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Html\Block\Div;
use Nemundo\Core\Type\Geo\GeoCoordinate;


// https://developers.google.com/maps/tutorials/fundamentals/adding-a-google-map


class GoogleMaps extends Div
{

    use LibraryTrait;

    /**
     * @var bool
     */
    public $centerMap = false;

    /**
     * @var bool
     */
    public $setMarker = true;

    /**
     * @var GeoCoordinate
     */
    public $geoCoordinate;

    /**
     * Zoom (Stufe zwischen .. und ..)
     *
     * @var int
     */
    public $zoom = 8;

    /**
     * Map Type
     *
     * @var GoogleMapsType
     */
    public $mapType = GoogleMapsType::ROADMAP;

    /**
     * @var int
     */
    public $width;

    /**
     * @var int
     */
    public $height;  // = 500;


    /**
     * Google Api Key (https://developers.google.com/maps/documentation/javascript/get-api-key)
     *
     * @var string
     */
    public $apiKey;


    private $kmlLayer = [];

    protected function loadContainer()
    {

        $this->geoCoordinate = new GeoCoordinate();

        if (GoogleMapsConfig::$googleMapsKey !== null) {
            $this->apiKey = GoogleMapsConfig::$googleMapsKey;
        }

    }


    public function addKmlLayer($url)
    {
        $this->kmlLayer[] = $url;
        return $this;
    }


    public function getContent()
    {


        $this->checkProperty('apiKey');

        //$this->setAutoId();
        $this->id = 'google_map';


        $this->addAttribute('style', 'height: ' . $this->height . 'px;width: 100%;');


        // Js Library
        $this->addJsUrl('https://maps.googleapis.com/maps/api/js?key=' . $this->apiKey);

        // Js Code
        $this->addJavaScript('function initialize() {');
        $this->addJavaScript('var mapCanvas = document.getElementById("' . $this->id . '");');

        $this->addJavaScript('var mapOptions = {');

        if ($this->centerMap) {
            $this->addJavaScript('center: new google.maps.LatLng(' . $this->geoCoordinate->latitude . ',' . $this->geoCoordinate->longitude . '),');
        }

        $this->addJavaScript('zoom: ' . $this->zoom . ',');
        $this->addJavaScript('mapTypeId: google.maps.MapTypeId.' . $this->mapType);
        $this->addJavaScript('};');
        $this->addJavaScript('var map = new google.maps.Map(mapCanvas, mapOptions);');
        $this->addJavaScript('');


        // Marker (in externe Klasse auslagern)
        /*if ($this->setMarker) {

            if ($this->geoCoordinate !== null) {
                $this->addJavaScript('var marker = new google.maps.Marker({');
                $this->addJavaScript('position: {lat: ' . $this->geoCoordinate->latitude . ', lng: ' . $this->geoCoordinate->longitude . '},');
                $this->addJavaScript(' map: map,');
                $this->addJavaScript(' title: "Point XY"');
                $this->addJavaScript('});');
            }
        }*/


        foreach ($this->kmlLayer as $kmlLayer) {

            $this->addJavaScript('var ctaLayer = new google.maps.KmlLayer({');
            $this->addJavaScript('url: "' . $kmlLayer . '",');
            $this->addJavaScript('map: map');
            $this->addJavaScript('});');

        }

        $this->addJavaScript('}');
        $this->addJavaScript('google.maps.event.addDomListener(window, "load", initialize);');


        return parent::getContent();


    }

}
