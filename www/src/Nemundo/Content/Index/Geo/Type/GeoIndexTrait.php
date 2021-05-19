<?php


namespace Nemundo\Content\Index\Geo\Type;


use Nemundo\Content\Index\Geo\Index\GeoIndexBuilder;
use Nemundo\Content\Index\Geo\Kml\ContentKmlMarker;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Type\Geo\AbstractGeoCoordinate;
use Nemundo\Geo\Kml\Object\KmlMarker;
use Nemundo\Html\Container\AbstractTagContainer;


trait GeoIndexTrait
{


    /**
     * @var string
     */
    public $kmlContainerClass;


    public function hasKmlMarker()
    {

        return $this->hasProperty($this->kmlContainerClass);

    }


    public function getKmlMarker(AbstractTagContainer $container) {

        $className = $this->kmlContainerClass;

        /** @var ContentKmlMarker $kmlMarker */
        $kmlMarker = new $className($container);
        $kmlMarker->content=$this;

        return $kmlMarker;

    }





    /**
     * @return AbstractGeoCoordinate
     */
    abstract public function getCoordinate();

    // getGeoCoordinate

    protected function saveGeoIndex()
    {

        $coordinate = $this->getCoordinate();

        if ($coordinate->hasValue()) {


            (new GeoIndexBuilder($this))->buildIndex();

            /*
            $data = new GeoIndex();
            $data->updateOnDuplicate = true;
            $data->place = $this->getPlace();
            $data->coordinate = $coordinate;
            $data->contentId = $this->getContentId();
            $data->save();*/


        }

    }


    protected function deleteGeoIndex()
    {

        (new GeoIndexBuilder($this))->deleteIndex();

        /*
        $delete = new GeoIndexDelete();
        $delete->filter->andEqual($delete->model->contentId, $this->getContentId());
        $delete->delete();*/

    }


    // als Job???
    protected function saveDistance()
    {


    }


    public function getPlace()
    {
        return $this->getSubject();
    }

}