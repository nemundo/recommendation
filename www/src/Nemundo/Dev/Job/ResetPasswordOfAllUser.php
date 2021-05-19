<?php

namespace Nemundo\Dev\Job;


use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Core\Type\Text\Text;

use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Type\UserSessionType;


// Nemundo\Admin\User\Script
class ResetPasswordOfAllUser extends AbstractScript
{


    protected function loadScript()
    {

    }


    public function run()
    {


        $reader = new UserReader();

        foreach ($reader->getData() as $row) {


            $userItem = new UserSessionType($row->id);

            //$userItem->addUsergroup(SchleunigerUsergroup::TEST_USER);

            $pwd = new Text($row->login);
            $pwd->changeToLowercase();
            $userItem->changePassword($pwd->getValue());


            //$userBuilder = new UserBuilder();


            // $userBuilder->addUsergroup()


            /*$pwd = new PasswordChange();
            $pwd->login = $row->login;
            $pwd->password = $row->login;
            $pwd->changePassword();*/

        }


    }


}