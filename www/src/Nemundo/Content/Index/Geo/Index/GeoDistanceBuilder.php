<?php


namespace Nemundo\Content\Index\Geo\Index;


use Nemundo\Content\Index\Geo\Data\Distance\DistanceBulk;
use Nemundo\Content\Index\Geo\Data\Distance\DistanceDelete;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexReader;
use Nemundo\Content\Type\Index\AbstractIndexBuilder;
use Nemundo\Core\Geo\Distance\GeoCoordinateDistance;

class GeoDistanceBuilder extends AbstractIndexBuilder
{

    public $distanceMeterLimit;


    public function buildIndex()
    {

        $this->deleteIndex();

        $data = new DistanceBulk();

        //(new DistanceDelete())->delete();

        $reader1 = new GeoIndexReader();
        $reader1->filter->andEqual($reader1->model->contentId, $this->contentType->getContentId());
        foreach ($reader1->getData() as $geoIndexRowFrom) {

            $readerTo = new GeoIndexReader();
            $readerTo->filter->andNotEqual($readerTo->model->contentId, $geoIndexRowFrom->contentId);
            foreach ($readerTo->getData() as $geoIndexRowTo) {

                $distance = new GeoCoordinateDistance();
                $distance->geoCoordinateFrom = $geoIndexRowFrom->coordinate;
                $distance->geoCoordinateTo = $geoIndexRowTo->coordinate;

                $distanceMeter = $distance->getDistanceInMetre();


                $insertItem = true;

                if ($this->distanceMeterLimit !== null) {

                    if ($distanceMeter > $this->distanceMeterLimit) {
                        $insertItem = false;
                    }

                }

                if ($insertItem) {
                    $data->contentFromId = $geoIndexRowFrom->contentId;
                    $data->contentToId = $geoIndexRowTo->contentId;
                    $data->distance = $distance->getDistanceInMetre();
                    $data->save();
                }


            }

        }

        $data->saveBulk();

    }


    public function deleteIndex()
    {

        $delete = new DistanceDelete();
        $delete->filter->andEqual($delete->model->contentFromId, $this->contentType->getContentId());
        $delete->delete();

    }


    /*
    public function deleteAllIndex()
    {

        $delete = new DistanceDelete();
        $delete->filter->andEqual($delete->model->contentFrom->contentTypeId, $this->contentType->typeId);
        $delete->delete();

    }*/


}