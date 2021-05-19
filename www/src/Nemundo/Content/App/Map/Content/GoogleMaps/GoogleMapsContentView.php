<?php

namespace Nemundo\Content\App\Map\Content\GoogleMaps;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Geo\Map\GoogleMaps\GoogleMaps;

class GoogleMapsContentView extends AbstractContentView
{
    /**
     * @var GoogleMapsContentType
     */
    public $contentType;


    protected function loadView()
    {
        // TODO: Implement loadView() method.
    }

    public function getContent()
    {

        //$map = new GoogleMaps($this);
        //$map->addKmlLayer();


        return parent::getContent();
    }
}