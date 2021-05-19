<?php


namespace Nemundo\Content\App\Stream\Event;


use Nemundo\Content\App\Stream\Data\Stream\Stream;
use Nemundo\Content\Event\AbstractContentEvent;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\AbstractType;

class StreamEvent extends AbstractContentEvent
{

    /**
     * @param AbstractType|AbstractContentType $contentType
     */
    public function onCreate(AbstractType $contentType)
    {

        $data = new Stream();
        $data->contentId = $contentType->getContentId();
        $data->hasMessage = false;
        $data->active = true;
        $data->contentViewId = $contentType->getDefaultViewId();
        $data->save();

    }

}