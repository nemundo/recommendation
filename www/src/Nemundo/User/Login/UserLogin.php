<?php

namespace Nemundo\User\Login;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\User\Data\User\UserCount;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Login\Cookie\LoginCookie;
use Nemundo\User\Login\Cookie\SecureTokenCookie;
use Nemundo\User\Login\Session\IsLoggedSession;
use Nemundo\User\Login\Session\LoginNameSession;
use Nemundo\User\Login\Session\UserIdSession;
use Nemundo\User\Password\PasswordVerification;

class UserLogin extends AbstractBase
{

    /**
     * @var string
     */
    public $login;

    /**
     * @var string
     */
    public $password;

    /**
     * @var bool
     */
    public $passwordVerification = true;

    /**
     * @var bool
     */
    public $saveCookiePassword = false;


    public function loginUser()
    {

        $returnValue = false;

        $userCount = new UserCount();
        $userCount->filter->andEqual($userCount->model->active, true);
        $userCount->filter->andEqual($userCount->model->login, $this->login);

        if ($userCount->getCount() == 1) {

            $userReader = new UserReader();
            $userReader->filter->andEqual($userReader->model->login, $this->login);
            $userRow = $userReader->getRow();

            if ($this->passwordVerification) {

                $passwordVerification = new PasswordVerification();
                $passwordVerification->password = $this->password;
                $passwordVerification->passwordHash = $userRow->password;

                if ($passwordVerification->verifyPassword()) {
                    $returnValue = true;
                }

            } else {
                $returnValue = true;
            }


            if ($returnValue) {

                $session = new LoginNameSession();
                $session->setValue($userRow->login);

                $session = new UserIdSession();
                $session->setValue($userRow->id);

                $session = new IsLoggedSession();
                $session->setValue(true);

                if ($this->saveCookiePassword) {
                    $cookie = new LoginCookie();
                    $cookie->setValue($this->login);

                    $cookie = new SecureTokenCookie();
                    $cookie->setValue($userRow->secureToken);
                }

            }

        }

        return $returnValue;

    }

}