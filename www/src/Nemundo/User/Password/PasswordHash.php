<?php

namespace Nemundo\User\Password;


use Nemundo\Core\Base\AbstractBase;

class PasswordHash extends AbstractBase
{

    /**
     * @var string
     */
    public $password;


    public function __construct($password = null)
    {
        $this->password = $password;
    }


    public function getHashPassword()
    {
        $hash = password_hash($this->password, PASSWORD_DEFAULT);
        return $hash;
    }


}