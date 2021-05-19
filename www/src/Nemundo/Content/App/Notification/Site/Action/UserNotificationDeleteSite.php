<?php


namespace Nemundo\Content\App\Notification\Site\Action;


use Nemundo\Content\App\Notification\Data\Notification\NotificationDelete;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\User\Session\UserSession;

class UserNotificationDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var UserNotificationDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Delete Notification';
        $this->url = 'delete-user-notfication';
        UserNotificationDeleteSite::$site=$this;
    }


    public function loadContent()
    {

        $delete = new NotificationDelete();
        $delete->filter->andEqual($delete->model->userId, (new UserSession())->userId);
        $delete->delete();

        (new UrlReferer())->redirect();

    }

}