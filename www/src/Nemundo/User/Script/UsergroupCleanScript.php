<?php

namespace Nemundo\User\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Console\ConsoleInput;
use Nemundo\Core\Debug\Debug;
use Nemundo\User\Data\User\UserCount;
use Nemundo\User\Data\Usergroup\UsergroupCount;
use Nemundo\User\Data\UserUsergroup\UserUsergroupDelete;
use Nemundo\User\Data\UserUsergroup\UserUsergroupReader;




class UsergroupCleanScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'usergroup-clean';
    }


    public function run()
    {

        $reader = new UserUsergroupReader();
        foreach ($reader->getData() as $userUsergroupRow) {

            $count = new UserCount();
            $count->filter->andEqual($count->model->id,$userUsergroupRow->userId);
            if ($count->getCount() == 0) {
                (new UserUsergroupDelete())->deleteById($userUsergroupRow->id);
            }

            $count = new UsergroupCount();
            $count->filter->andEqual($count->model->id,$userUsergroupRow->usergroupId);
            if ($count->getCount() == 0) {
                (new UserUsergroupDelete())->deleteById($userUsergroupRow->id);
            }

        }

    }

}