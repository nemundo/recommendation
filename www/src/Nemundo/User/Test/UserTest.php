<?php

namespace Nemundo\User\Test;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Structure\ForLoop;
use Nemundo\User\Type\UserItemType;

class UserTest extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'user-test';
    }


    public function run()
    {

        $loop = new ForLoop();
        $loop->minNumber = 1;
        $loop->maxNumber = 10;
        foreach ($loop->getData() as $number) {

            $login = 'user' . $number;

            $builder = new UserItemType();
            $builder->login = $login;
            $builder->email = $login . '@test.com';
            $builder->addAllUsergroup();
            $builder->createUser();

            $builder->changePassword($login);

        }

    }

}