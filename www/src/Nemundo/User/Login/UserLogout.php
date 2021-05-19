<?php

namespace Nemundo\User\Login;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\User\Login\Cookie\LoginCookie;
use Nemundo\User\Login\Cookie\SecureTokenCookie;
use Nemundo\User\Login\Session\IsLoggedSession;
use Nemundo\User\Login\Session\LoginNameSession;
use Nemundo\User\Login\Session\UserIdSession;

class UserLogout extends AbstractBase
{

    public function logout()
    {

        $session = new LoginNameSession();
        $session->deleteSession();

        $session = new UserIdSession();
        $session->deleteSession();

        $session = new IsLoggedSession();
        $session->deleteSession();

        $cookie = new LoginCookie();
        $cookie->deleteCookie();

        $cookie = new SecureTokenCookie();
        $cookie->deleteCookie();

    }

}