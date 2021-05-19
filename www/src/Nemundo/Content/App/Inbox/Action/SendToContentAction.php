<?php

namespace Nemundo\Content\App\Inbox\Action;


use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\App\Inbox\Data\Inbox\Inbox;
use Nemundo\User\Session\UserSession;

class SendToContentAction extends AbstractContentAction
{


    public $userId;

    public $message;

    //public $userIdFrom;

    protected function loadContentType()
    {

        $this->typeId = '34537bb4-f427-4777-98bc-1c1bce403bb7';
        $this->typeLabel='Send Inbox Action';

        $this->actionLabel = 'Send To';

        $this->formClassList[]=SendToContentForm::class;


    }


    public function onAction()
    {

        // send email
        // notifiaction

        $data = new Inbox();
        $data->userId = $this->userId;
        $data->contentId = $this->actionContentId;
        $data->fromId = (new UserSession())->userId;
        $data->message = $this->message;
        $data->save();

    }

}