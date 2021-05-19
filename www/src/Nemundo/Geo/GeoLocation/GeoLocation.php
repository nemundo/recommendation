<?php

namespace Nemundo\Com\Geo\GeoLocation;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Com\Container\LibraryTrait;

class GeoLocation extends AbstractHtmlContainer
{

    use LibraryTrait;

    public function getContent()
    {

        $this->addJavaScript('');


        /*
        <script>
var x = document.getElementById("demo");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude +
        "<br>Longitude: " + position.coords.longitude;
}
</script>*/


        return parent::getContent();
    }

}