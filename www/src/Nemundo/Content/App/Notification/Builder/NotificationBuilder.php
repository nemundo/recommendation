<?php


namespace Nemundo\Content\App\Notification\Builder;


use Nemundo\Content\App\Notification\Data\Notification\Notification;
use Nemundo\Content\Type\Index\AbstractIndexBuilder;

class NotificationBuilder extends AbstractIndexBuilder
{

    public function createNotification($userId) {

        $data = new Notification();
        $data->userId = $userId;
        $data->contentId = $this->contentType->getContentId();
        $data->isDeleted=false;
        $data->save();


    }



    public function buildIndex()
    {




    }


    public function deleteIndex()
    {
        // TODO: Implement deleteIndex() method.
    }

}