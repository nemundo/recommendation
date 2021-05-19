<?php

namespace Nemundo\App\Application\Usergroup;

use Nemundo\User\Usergroup\AbstractUsergroup;

class AdminUsergroup extends AbstractUsergroup
{
    protected function loadUsergroup()
    {
        $this->usergroup = 'Admin';
        $this->usergroupId = '4f3fd3ce-18e9-4504-8b97-212c45cfe08b';
    }
}