<?php

namespace Nemundo\Content\Index\Geo\Scheduler;

use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\Content\Index\Geo\Data\Distance\Distance;
use Nemundo\Content\Index\Geo\Data\Distance\DistanceDelete;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexReader;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Geo\Distance\GeoCoordinateDistance;


class GeoDistanceScheduler extends AbstractScheduler
{
    protected function loadScheduler()
    {

        $this->consoleScript = true;
        $this->scriptName = 'geo-distance';


    }

    public function run()
    {


        // contenttype

        (new DistanceDelete())->delete();

        $reader1 = new GeoIndexReader();
        foreach ($reader1->getData() as $geoIndexRowFrom) {

            $readerTo = new GeoIndexReader();
            $readerTo->filter->andNotEqual($readerTo->model->contentId, $geoIndexRowFrom->contentId);
            foreach ($readerTo->getData() as $geoIndexRowTo) {

                $distance = new GeoCoordinateDistance();
                $distance->geoCoordinateFrom = $geoIndexRowFrom->coordinate;
                $distance->geoCoordinateTo = $geoIndexRowTo->coordinate;

                $data = new Distance();
                $data->contentFromId = $geoIndexRowFrom->contentId;
                $data->contentToId = $geoIndexRowTo->contentId;
                $data->distance = $distance->getDistanceInMetre();
                $data->save();

            }


        }


    }
}