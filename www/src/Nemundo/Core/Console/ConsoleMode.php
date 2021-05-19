<?php

namespace Nemundo\Core\Console;


use Nemundo\Core\Base\AbstractBase;

class ConsoleMode extends AbstractBase
{

    public function isConsole()
    {

        // save in static variable ???

        $value = false;
        if ((php_sapi_name() == 'cli')) {
            $value = true;
        }
        return $value;

    }

}