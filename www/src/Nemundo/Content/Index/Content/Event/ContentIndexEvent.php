<?php


namespace Nemundo\Content\Index\Content\Event;


use Nemundo\Content\Data\Content\Content;
use Nemundo\Content\Event\AbstractContentEvent;
use Nemundo\Content\Type\AbstractType;

class ContentIndexEvent extends AbstractContentEvent
{

    public function onCreate(AbstractType $contentType)
    {

        $data = new Content();
        $data->updateOnDuplicate=true;
        $data->contentTypeId = $contentType->typeId;
        $data->dataId = $contentType->getDataId();
        $data->subject = $contentType->getSubject();
        $data->save();

    }

}