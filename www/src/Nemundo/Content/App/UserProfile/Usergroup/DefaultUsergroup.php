<?php

namespace Nemundo\Content\App\UserProfile\Usergroup;

use Nemundo\User\Usergroup\AbstractUsergroup;

class DefaultUsergroup extends AbstractUsergroup
{
    protected function loadUsergroup()
    {
        $this->usergroup = 'Default Usergroup';
        $this->usergroupId = '6fa0d27a-2d41-49fd-89c8-33ebfcb0523c';
    }
}