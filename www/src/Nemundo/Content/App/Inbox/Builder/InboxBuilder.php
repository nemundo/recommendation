<?php


namespace Nemundo\Content\App\Inbox\Builder;


use Nemundo\Content\App\Inbox\Data\Inbox\Inbox;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;

class InboxBuilder extends AbstractBase
{

    /**
     * @var AbstractContentType
     */
    private $contentType;

    public function __construct(AbstractContentType $contentType) {

        $this->contentType=$contentType;

    }


    public function sendMessage($userId) {

        $data = new Inbox();
        $data->userId = $userId;
        $data->contentId = $this->contentType->getContentId();
        $data->save();



    }

}