<?php

namespace Nemundo\Content\App\Map\Content\Route;

use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Content\App\Map\Parameter\RouteParameter;
use Nemundo\Content\App\Map\Site\RouteKmlSite;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Swisstopo\Map\Com\Map\SwissMap;
use Nemundo\Swisstopo\Map\Type\LayerType;

class RouteContentView extends AbstractContentView
{
    /**
     * @var RouteContentType
     */
    public $contentType;

    //public $viewName = 'Map';


    protected function loadView()
    {
        // TODO: Implement loadView() method.

        $this->viewId = '4bfb56a3-90d8-41f9-b681-e49e8438a3d4';
        $this->viewName = 'Map';
        $this->defaultView = true;

    }

    public function getContent()
    {

        $routeId = $this->contentType->getDataId();

        $kmlSite = clone(RouteKmlSite::$site);
        $kmlSite->addParameter(new RouteParameter($routeId));

        $btn = new AdminIconSiteButton($this);
        $btn->site = $kmlSite;

        //46.17490452962048, 6.036027976886541
        //46.87716059207539, 8.043141586531924

        /*$center=new GeoCoordinate();
        $center->latitude =46.87716059207539;
        $center->longitude=8.043141586531924;*/


        $map = new SwissMap($this);
        $map->addLayer(LayerType::PIXELKARTE);
        $map->addKmlLayer($kmlSite->getUrlWithDomain());


        //$map->mapCenter =$center;
        //$map->zoomLevel = 5;

        return parent::getContent();

    }
}