<?php

namespace Nemundo\User\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Console\ConsoleInput;
use Nemundo\User\Builder\UserBuilder;


class AdminUserScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'admin-user';
    }


    public function run()
    {

        $input = new ConsoleInput();
        $input->message = 'Password';
        $password = $input->getValue();

        $user = new UserBuilder();
        $user->login = 'admin';
        $user->email = 'noreply@noreply.com';
        $user->createUser();

        $user->changePassword($password);
        $user->addAllUsergroup();

    }

}