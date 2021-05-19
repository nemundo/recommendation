<?php

namespace Nemundo\Content\App\Stream\Usergroup;

use Nemundo\User\Usergroup\AbstractUsergroup;

class StreamUsergroup extends AbstractUsergroup
{
    protected function loadUsergroup()
    {
        $this->usergroup = 'Stream';
        $this->usergroupId = '78c9bd45-d6a8-4a01-81dc-20f05756e211';
    }
}