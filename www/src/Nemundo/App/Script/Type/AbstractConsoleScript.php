<?php

namespace Nemundo\App\Script\Type;


abstract class AbstractConsoleScript extends AbstractScript
{

    public function __construct()
    {
        $this->consoleScript = true;
        parent::__construct();
    }


}