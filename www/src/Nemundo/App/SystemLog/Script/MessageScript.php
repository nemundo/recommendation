<?php

namespace Nemundo\App\SystemLog\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\App\SystemLog\Message\SystemLogMessage;
use Nemundo\Core\Console\ConsoleArgument;

class MessageScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'systemlog-message';
    }

    public function run()
    {

        $message = (new ConsoleArgument())->getValue(1);
        (new SystemLogMessage())->logInformation($message);

    }
}