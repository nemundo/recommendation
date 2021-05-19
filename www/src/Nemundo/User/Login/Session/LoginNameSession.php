<?php

namespace Nemundo\User\Login\Session;


use Nemundo\Core\Http\Session\AbstractSession;

class LoginNameSession extends AbstractSession
{

    protected function loadSession()
    {
        $this->sessionName = 'nemundo_login';
    }

}