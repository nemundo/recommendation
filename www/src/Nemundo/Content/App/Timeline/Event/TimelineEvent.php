<?php


namespace Nemundo\Content\App\Timeline\Event;


use Nemundo\Content\App\Timeline\Data\Timeline\Timeline;
use Nemundo\Content\App\Timeline\Data\Timeline\TimelineCount;
use Nemundo\Content\App\Timeline\Data\Timeline\TimelineUpdate;
use Nemundo\Content\Event\AbstractContentEvent;
use Nemundo\Content\Index\Calendar\DateTimeIndexTrait;
use Nemundo\Content\Type\AbstractType;
use Nemundo\Content\Type\ContentIndexTrait;

class TimelineEvent extends AbstractContentEvent
{


    /**
     * @param AbstractType|ContentIndexTrait|DateTimeIndexTrait $contentType
     */
    public function onCreate(AbstractType $contentType)
    {

        $data = new Timeline();
        $data->updateOnDuplicate=true;
        $data->contentId = $contentType->getContentId();
        $data->dateTime = $contentType->getDateTime();
        $data->date = $contentType->getDate();
        $data->subject = $contentType->getSubject();
        $data->save();



        /*
        $count = new TimelineCount();
        $count->filter->andEqual($count->model->contentId, $contentType->getContentId());
        if ($count->getCount() == 0) {

            $data = new Timeline();
            $data->contentId = $contentType->getContentId();
            $data->dateTime = $contentType->getDateTime();
            $data->date = $contentType->getDate();
            $data->subject = $contentType->getSubject();
            $data->save();

        } else {

            $update = new TimelineUpdate();
            $update->filter->andEqual($count->model->contentId, $contentType->getContentId());
            $update->dateTime = $contentType->getDateTime();
            $update->date = $contentType->getDate();
            $update->subject = $contentType->getSubject();
            $update->update();

        }*/

    }


    public function onUpdate(AbstractType $contentType)
    {
        $this->onCreate($contentType);

    }

}