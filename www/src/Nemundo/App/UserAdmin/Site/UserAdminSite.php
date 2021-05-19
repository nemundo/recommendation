<?php

namespace Nemundo\App\UserAdmin\Site;


use Nemundo\App\UserAdmin\Page\UserAdminPage;
use Nemundo\Web\Site\AbstractSite;


class UserAdminSite extends AbstractSite
{

    /**
     * @var UserAdminSite
     */
    public static $site;


    protected function loadSite()
    {
        $this->title = 'User';
        $this->url = 'user';

        new UserNewSite($this);
        new UserEditSite($this);
        new UserDeleteSite($this);
        new PasswordChangeSite($this);

        UserAdminSite::$site = $this;
    }


    public function loadContent()
    {
        (new UserAdminPage())->render();
    }

}