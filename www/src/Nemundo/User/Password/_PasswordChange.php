<?php

namespace Nemundo\User\Password;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\User\Data\User\UserUpdate;


// ChangePassword
// PasswordReset
class PasswordChange extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $login;

    /**
     * @var string
     */
    public $password;


    public function changePassword()
    {

        $passwordHash = new PasswordHash();
        $passwordHash->password = $this->password;

        $update = new UserUpdate();
        $update->password = $passwordHash->getHashPassword();
        $update->filter->andEqual($update->model->login, $this->login);
        $update->update();

    }


}