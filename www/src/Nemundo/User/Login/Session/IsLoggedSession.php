<?php

namespace Nemundo\User\Login\Session;


use Nemundo\Core\Http\Session\AbstractSession;

class IsLoggedSession extends AbstractSession
{

    protected function loadSession()
    {
        $this->sessionName = 'nemundo_is_logged';
    }

}