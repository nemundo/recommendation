<?php

namespace Nemundo\App\Application\Usergroup;

use Nemundo\User\Usergroup\AbstractUsergroup;

class AppUsergroup extends AbstractUsergroup
{
    protected function loadUsergroup()
    {
        $this->usergroup = 'App';
        $this->usergroupId = '44cdbdd0-1a60-4a5e-ba11-823fc5fc106a';
    }
}