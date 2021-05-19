<?php

namespace Nemundo\Content\App\UserProfile\Site;

use Nemundo\Content\App\UserProfile\Page\MyUserProfilePage;
use Nemundo\Web\Site\AbstractSite;

class MyUserProfileSite extends AbstractSite
{

    /**
     * @var MyUserProfileSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'My Profile';
        $this->url = 'my-user-profile';
        $this->menuActive = false;
        MyUserProfileSite::$site = $this;
    }

    public function loadContent()
    {
        (new MyUserProfilePage())->render();
    }
}