<?php


namespace Nemundo\Content\Index\Geo\Event;


use Nemundo\Content\Event\AbstractContentEvent;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndex;
use Nemundo\Content\Type\AbstractType;

class GeoIndexEvent extends AbstractContentEvent
{

    public function onCreate(AbstractType $contentType)
    {


        $data = new GeoIndex();
        $data->updateOnDuplicate = true;
        $data->place = $contentType->getSubject();
        $data->coordinate =  $contentType->getCoordinate();
        $data->contentId = $contentType->getContentId();
        $data->save();


    }

}