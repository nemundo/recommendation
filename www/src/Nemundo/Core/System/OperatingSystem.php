<?php

namespace Nemundo\Core\System;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Text\Text;

class OperatingSystem extends AbstractBase
{

    public function getOperatingSystem()
    {

        $os = (new Text(PHP_OS))->changeToUppercase()->getValue();
        return $os;

    }


    public function isLinux()
    {

        $value = false;
        if ($this->getOperatingSystem() == 'LINUX') {
            $value = true;
        }

        return $value;

    }


    public function isWindows()
    {

        $value = false;
        if ($this->getOperatingSystem() == 'WINNT') {
            $value = true;
        }

        return $value;

    }

}