<?php

namespace Nemundo\App\Application\Usergroup;

use Nemundo\User\Usergroup\AbstractUsergroup;

class DefaultUsergroup extends AbstractUsergroup
{
    protected function loadUsergroup()
    {
        $this->usergroup = 'Default';
        $this->usergroupId = '4c1b5ff1-c59f-4196-8470-d6f146ec7397';
    }
}