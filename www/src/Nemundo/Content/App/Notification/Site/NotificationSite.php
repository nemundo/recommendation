<?php

namespace Nemundo\Content\App\Notification\Site;

use Nemundo\Content\App\Notification\Page\NotificationPage;
use Nemundo\Content\App\Notification\Site\Action\UserNotificationDeleteSite;
use Nemundo\Web\Site\AbstractSite;

class NotificationSite extends AbstractSite
{

    /**
     * @var NotificationSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Notification';
        $this->url = 'notification';
        NotificationSite::$site=$this;


        new ConfigSite($this);

        new UserNotificationDeleteSite($this);

    }

    public function loadContent()
    {
        (new NotificationPage())->render();
    }
}