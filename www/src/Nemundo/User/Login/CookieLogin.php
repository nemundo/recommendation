<?php

namespace Nemundo\User\Login;


use Nemundo\User\Data\User\UserCount;
use Nemundo\User\Login\Cookie\LoginCookie;
use Nemundo\User\Login\Cookie\SecureTokenCookie;
use Nemundo\User\Login\Session\IsLoggedSession;

class CookieLogin extends AbstractUserLogin
{

    public function checkLogin()
    {

        if (!(new IsLoggedSession)->exists()) {

            $loginCookie = new LoginCookie();
            if ($loginCookie->exists()) {

                $login = $loginCookie->getValue();

                $secureTokenParameter = new SecureTokenCookie();
                $secureToken = $secureTokenParameter->getValue();

                $count = new UserCount();
                $count->filter->andEqual($count->model->login, $login);
                $count->filter->andEqual($count->model->secureToken, $secureToken);
                $count->filter->andEqual($count->model->active, true);
                if ($count->getCount() == 1) {

                    $userLogin = new UserLogin();
                    $userLogin->passwordVerification = false;
                    $userLogin->login = $login;
                    $userLogin->loginUser();

                } else {

                    $loginCookie->deleteCookie();
                    $secureTokenParameter->deleteCookie();

                }

            }

        }

    }

}