<?php


namespace Hackathon\Event;


use Hackathon\Data\Master\Master;
use Nemundo\Content\Event\AbstractContentEvent;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\AbstractType;

class MasterEvent extends AbstractContentEvent
{


    /**
     * @param AbstractType|AbstractContentType $contentType
     */
    public function onCreate(AbstractType $contentType)
    {

        $data=new Master();
        $data->subject=$contentType->getSubject();
        $data->save();

    }

}