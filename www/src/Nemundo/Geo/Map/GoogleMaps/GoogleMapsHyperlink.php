<?php

namespace Nemundo\Geo\Map\GoogleMaps;



use Nemundo\Html\Hyperlink\AbstractHyperlink;

use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Html\Hyperlink\HyperlinkTarget;

class GoogleMapsHyperlink extends AbstractHyperlink  // UrlHyperlink
{

    /**
     * @var GeoCoordinate
     */
    public $geoCoordinate;

    protected function loadContainer()
    {
        parent::loadContainer();
        //$this->openNewWindow = true;
        $this->geoCoordinate = new GeoCoordinate();
    }


    public function getContent()
    {

        $label =   $this->geoCoordinate->latitude . ',' . $this->geoCoordinate->longitude;

        if ($this->content == null) {
            $this->content = $label;
        }

        $this->target = HyperlinkTarget::BLANK;
        $this->href = 'http://maps.google.com/maps?q=' . $label;

        return parent::getContent();
    }

}