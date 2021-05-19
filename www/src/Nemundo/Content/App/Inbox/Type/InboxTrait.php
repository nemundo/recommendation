<?php


namespace Nemundo\Content\App\Inbox\Type;


use Nemundo\Content\App\Inbox\Data\Inbox\Inbox;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Site\ContentSite;
use Nemundo\Content\Site\ContentViewSite;
use Nemundo\Package\ResponsiveMail\ResponsiveActionMailMessage;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Usergroup\AbstractUsergroup;

trait InboxTrait
{

    protected function sendUser($userId)
    {

        $data = new Inbox();
        $data->userId = $userId;
        $data->contentId = $this->getContentId();
        $data->save();

        $userRow = (new UserReader())->getRowById($userId);

        $mail = new ResponsiveActionMailMessage();
        $mail->mailTo = $userRow->email;
        $mail->subject = $this->getSubject();
        $mail->text = 'Hier gabe es was ...' . $this->getTypeLabel();

        $site = clone(ContentViewSite::$site);
        $site->addParameter(new ContentParameter($this->getContentId()));
        $mail->actionUrlSite = $site;

        $mail->sendMail();

        return $this;

    }


    public function sendUsergroup(AbstractUsergroup $usergroup)
    {

        foreach ($usergroup->getUserList() as $userRow) {
            $this->sendUser($userRow->id);
        }

        return $this;

    }

}