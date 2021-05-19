<?php

namespace Nemundo\Content\App\Timeline\Index;


use Nemundo\Content\App\Timeline\Data\Timeline\Timeline;
use Nemundo\Content\App\Timeline\Data\Timeline\TimelineCount;
use Nemundo\Content\App\Timeline\Data\Timeline\TimelineUpdate;
use Nemundo\Content\Type\Index\AbstractIndexBuilder;

class TimelineIndexBuilder extends AbstractIndexBuilder
{


    public function buildIndex()
    {

        $count = new TimelineCount();
        $count->filter->andEqual($count->model->contentId, $this->contentType->getContentId());
        if ($count->getCount() == 0) {

            $data = new Timeline();
            $data->contentId = $this->contentType->getContentId();
            $data->dateTime = $this->contentType->getDateTime();
            $data->date = $this->contentType->getDate();
            $data->subject = $this->contentType->getSubject();
            $data->save();

        } else {

            $update = new TimelineUpdate();
            $update->filter->andEqual($count->model->contentId, $this->contentType->getContentId());
            $update->dateTime = $this->contentType->getDateTime();
            $update->date = $this->contentType->getDate();
            $update->subject = $this->contentType->getSubject();
            $update->update();

        }

        // TODO: Implement buildIndex() method.
    }


    public function deleteIndex()
    {
        // TODO: Implement deleteIndex() method.
    }


}