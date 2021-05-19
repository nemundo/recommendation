<?php

namespace Nemundo\User\Password;


class PasswordVerification
{

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $passwordHash;


    public function verifyPassword()
    {
        $returnValue = password_verify($this->password, $this->passwordHash);
        return $returnValue;
    }

}