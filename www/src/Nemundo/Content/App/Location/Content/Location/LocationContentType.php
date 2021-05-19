<?php

namespace Nemundo\Content\App\Location\Content\Location;

use Nemundo\Content\App\Location\Data\Location\Location;
use Nemundo\Content\App\Location\Data\Location\LocationReader;
use Nemundo\Content\App\Location\Data\Location\LocationRow;

use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Type\Geo\GeoCoordinate;

class LocationContentType extends AbstractContentType
{

    public $location;

    public $description;

    /**
     * @var GeoCoordinate
     */
    public $geoCoordinate;


    protected function loadContentType()
    {
        $this->typeLabel = 'Location';
        $this->typeId = '33e62a5f-6ad1-48db-ad70-d86d516c8098';
        $this->formClassList[] = LocationContentForm::class;
        $this->viewClassList[]  = LocationContentView::class;
    }

    protected function onCreate()
    {

        $data=new Location();
        $data->location=$this->location;
        $data->description=$this->description;
        $data->geoCoordinate=$this->geoCoordinate;
        $this->dataId=$data->save();


    }

    protected function onUpdate()
    {
    }

    protected function onDataRow()
    {
        $this->dataRow=(new LocationReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|LocationRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }
}