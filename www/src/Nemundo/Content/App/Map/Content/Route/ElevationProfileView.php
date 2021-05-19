<?php


namespace Nemundo\Content\App\Map\Content\Route;


use Nemundo\Content\App\Map\Com\Chart\ElevationProfileChart;
use Nemundo\Content\View\AbstractContentView;

class ElevationProfileView extends AbstractContentView
{

    //public $viewName = 'Elevation Profile';


    protected function loadView()
    {
        // TODO: Implement loadView() method.
        $this->viewId='5cde9e1b-758e-4ffd-b7a2-3ef25055fc5f';
        $this->viewName = 'Elevation Profile';

    }

    public function getContent()
    {

        $routeId = $this->contentType->getDataId();

        $chart = new ElevationProfileChart($this);
        $chart->routeId = $routeId;

        return parent::getContent();

    }

}