<?php

namespace Nemundo\Content\App\Map\Content\Route;

use Nemundo\Content\App\Map\Data\Route\Route;
use Nemundo\Content\App\Map\Data\Route\RouteReader;
use Nemundo\Content\App\Map\Data\Route\RouteRow;
use Nemundo\Content\App\Map\Data\RouteCoordinate\RouteCoordinate;
use Nemundo\Content\App\Map\Data\RouteCoordinate\RouteCoordinateReader;
use Nemundo\Content\Index\Geo\Type\GeoIndexTrait;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Geo\Gpx\Reader\GpxReader;
use Nemundo\Model\Data\Property\File\FileProperty;

class RouteContentType extends AbstractContentType
{

    use GeoIndexTrait;

    public $route;

    /**
     * @var FileProperty
     */
    public $file;

    public $color;


    protected function loadContentType()
    {

        $this->typeLabel = 'Route';
        $this->typeId = '7ef1c8e5-76b4-4acb-9cbe-0381e88e49f9';

        $this->formClassList[] = RouteContentForm::class;
        $this->formClassList[] = ContentSearchForm::class;

        $this->viewClassList[] = RouteContentView::class;
        $this->viewClassList[] = ElevationProfileView::class;

        $this->kmlContainerClass=RouteContentKmlLine::class;

        $this->file = new FileProperty();

    }

    protected function onCreate()
    {

        $data = new Route();
        $data->route = $this->route;
        $data->gpxFile->fromFileProperty($this->file);
        $data->color=$this->color;
        $this->dataId = $data->save();

        $this->onDataRow();

        $gpxReader = new GpxReader($this->getDataRow()->gpxFile->getFullFilename());
        foreach ($gpxReader->getData() as $coordinateAltitude) {

            $data = new RouteCoordinate();
            $data->routeId = $this->dataId;
            $data->geoCoordinate = $coordinateAltitude;
            $data->save();

        }

    }


    protected function onUpdate()
    {
    }


    protected function onIndex()
    {

        $this->saveGeoIndex();

    }


    protected function onDataRow()
    {
        $this->dataRow = (new RouteReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|RouteRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->route;
    }


    public function getCoordinate()
    {

        $coordinate = null;

        $reader = new RouteCoordinateReader();
        $reader->filter->andEqual($reader->model->routeId, $this->getDataId());
        $reader->addOrder($reader->model->id);
        $reader->limit = 1;
        foreach ($reader->getData() as $coordinateRow) {

            $coordinate = $coordinateRow->geoCoordinate;

        }

        return $coordinate;

    }


}