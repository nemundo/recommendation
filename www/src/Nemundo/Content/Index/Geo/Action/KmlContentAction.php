<?php

namespace Nemundo\Content\Index\Geo\Action;


use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\Index\Geo\Site\Kml\GeoIndexKmlSite;

class KmlContentAction extends AbstractContentAction
{

    protected function loadContentType()
    {

        $this->typeLabel='Kml Content Action';
        $this->typeId='4d8c2af6-fb95-42bb-b857-067f70a72cdf';
$this->actionLabel='Kml';

        $this->viewSite=GeoIndexKmlSite::$site;

        // TODO: Implement loadContentType() method.
    }

}