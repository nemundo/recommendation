<?php

namespace Nemundo\Core\Type\Geo;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Type\Text\Text;

abstract class AbstractGeoCoordinate extends AbstractBaseClass
{

    // isNull Function ???

    /**
     * @var float
     */
    public $latitude;

    /**
     * @var float
     */
    public $longitude;


    abstract protected function loadGeoCoordinate();

    public function __construct()
    {
        $this->loadGeoCoordinate();
    }


    protected function fromText($text)
    {

        $text = new Text($text);
        $list = $text->split(',');

        /*$this->latitude = $list[0];
        $this->longitude = $list[1];*/


        $this->latitude = trim($list[0]);
        $this->longitude = trim($list[1]);

        return $this;

    }


    public function hasValue()
    {

        $value = false;
        if (($this->latitude !== '') && ($this->latitude !== null) && ($this->longitude !== '') && ($this->longitude !== null)) {
            $value = true;
        }
        return $value;

    }

    public function getText()
    {

        $text = $this->latitude . ',' . $this->longitude;
        return $text;

    }

}