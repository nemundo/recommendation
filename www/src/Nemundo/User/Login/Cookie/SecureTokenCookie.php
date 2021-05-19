<?php

namespace Nemundo\User\Login\Cookie;


use Nemundo\User\UserConfig;
use Nemundo\Core\Http\Cookie\AbstractCookie;

class SecureTokenCookie extends AbstractCookie
{

    protected function loadCookie()
    {
        $this->cookieName = 'nemundo_secure_token';
        $this->dayOfExpire = UserConfig::$loginCookieDayOfExpire;
    }

}