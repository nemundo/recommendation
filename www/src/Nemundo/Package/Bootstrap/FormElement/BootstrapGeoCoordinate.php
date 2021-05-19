<?php

namespace Nemundo\Package\Bootstrap\FormElement;

use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class BootstrapGeoCoordinate extends AbstractContainer
{

    use LibraryTrait;

    /**
     * @var BootstrapTextBox
     */
    private $lat;

    /**
     * @var BootstrapTextBox
     */
    private $lon;

    /**
     * @var GeoCoordinate
     */
    public $geoCoordinate;

    protected function loadContainer()
    {

        parent::loadContainer();

        $formRow = new BootstrapRow($this);

        $this->lat = new BootstrapTextBox($formRow);
        $this->lat->label = 'Lat';
        $this->lat->name = 'geo_lat';

        $this->lon = new BootstrapTextBox($formRow);
        $this->lon->label = 'Lon';
        $this->lon->name = 'geo_lon';

    }


    public function getContent()
    {

        if ($this->geoCoordinate !== null) {
            $this->lat->value = $this->geoCoordinate->latitude;
            $this->lon->value = $this->geoCoordinate->longitude;
        }


        $this->addJavaScript('let doc = new DocumentContainer();
doc.onLoaded = function () {

    let latInput = new InputContainer("geo_lat");
    latInput.onInput = function () {

        let value = latInput.value;
        var valueList = value.split(",");

        if (valueList.length == 2) {

            latInput.value = valueList[0];

            let lonInput = new InputContainer("geo_lon");
            lonInput.value = valueList[1];
        
        }

    }

};');

        return parent::getContent();

    }


    public function hasValue()
    {

        $value = false;
        if (($this->lat->getValue() !== '') || ($this->lon->getValue() !== '')) {
            $value = true;
        }
        return $value;

    }


    public function getGeoCoordinate()
    {

        /** @var GeoCoordinate $geoCoordinate */
        //$geoCoordinate = null;

        $geoCoordinate = new GeoCoordinate();

        if ($this->hasValue()) {

            $geoCoordinate->latitude = $this->lat->getValue();
            $geoCoordinate->longitude = $this->lon->getValue();
        }

        return $geoCoordinate;

    }


}