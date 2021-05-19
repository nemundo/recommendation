<?php

namespace Nemundo\App\UserAction\Site;

use Nemundo\Web\Site\AbstractSite;

class UserActionSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'UserAction';
        $this->url = 'user-action';
        $this->menuActive = false;

        new UserActivationSite($this);
        new LogoutSite($this);
        new PasswordChangeSite($this);
        new PasswordRequestSite($this);

    }

    public function loadContent()
    {


    }
}