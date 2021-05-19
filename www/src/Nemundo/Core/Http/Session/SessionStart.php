<?php

namespace Nemundo\Core\Http\Session;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Console\ConsoleMode;


class SessionStart extends AbstractBaseClass
{

    public function start()
    {

        if (session_status() == PHP_SESSION_NONE) {

            if (!(new ConsoleMode())->isConsole()) {
                //session_set_cookie_params(0, WebConfig::$webUrl);
                session_set_cookie_params(0, SessionConfig::$path);
                session_name(SessionConfig::$sessionName);
                session_start();
            }

        }

    }

}