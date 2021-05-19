<?php

namespace Nemundo\User\Login\Cookie;


use Nemundo\User\UserConfig;
use Nemundo\Core\Http\Cookie\AbstractCookie;

class LoginCookie extends AbstractCookie
{

    protected function loadCookie()
    {
        $this->cookieName = 'nemundo_login';
        $this->dayOfExpire = UserConfig::$loginCookieDayOfExpire;
    }

}