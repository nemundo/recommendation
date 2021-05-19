<?php

namespace Nemundo\User\Login;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Log\LogMessage;
use Nemundo\User\Data\User\UserCount;
use Nemundo\User\Data\User\UserValue;


class SecureTokenLogin extends AbstractBaseClass
{

    public function checkLogin($secureToken)
    {

        $userCount = new UserCount();
        $userCount->filter->andEqual($userCount->model->secureToken, $secureToken);
        if ($userCount->getCount() > 0) {

            $userValue = new UserValue();
            $userValue->field = $userValue->model->login;
            $userValue->filter->andEqual($userValue->model->secureToken, $secureToken);
            $login = $userValue->getValue();

            $userLogin = new UserLogin();
            $userLogin->passwordVerification = false;
            $userLogin->login = $login;
            $userLogin->loginUser();

        } else {
            (new LogMessage())->writeError('Secure Token does not exist');
            exit;
        }


    }

}