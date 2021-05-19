<?php

namespace Nemundo\User\Login\Session;


use Nemundo\Core\Http\Session\AbstractSession;

class UserIdSession extends AbstractSession
{

    protected function loadSession()
    {
        $this->sessionName = 'nemundo_user_id';
    }

}