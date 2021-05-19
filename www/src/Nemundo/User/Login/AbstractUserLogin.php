<?php

namespace Nemundo\User\Login;


use Nemundo\Core\Base\AbstractBaseClass;

abstract class AbstractUserLogin extends AbstractBaseClass
{

    abstract public function checkLogin();

}