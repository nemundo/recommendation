<?php


namespace Nemundo\Content\App\Timeline\Index;


use Nemundo\Content\App\Timeline\Data\Timeline\Timeline;
use Nemundo\Content\App\Timeline\Data\Timeline\TimelineDelete;
use Nemundo\Content\App\Timeline\Event\TimelineEvent;
use Nemundo\Content\Index\Calendar\DateTimeIndexTrait;


trait TimelineIndexTrait
{

    use DateTimeIndexTrait;

    protected function saveTimeline() {

        $event=new TimelineEvent();
        $event->onCreate($this);




    }


    protected function deleteTimeline() {

        $delete=new TimelineDelete();
        $delete->filter->andEqual($delete->model->contentId,$this->getContentId());
        $delete->delete();

    }


}