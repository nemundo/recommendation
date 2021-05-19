<?php

namespace Nemundo\App\SystemLog\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\App\SystemLog\Data\Log\LogDelete;

class SystemLogCleanScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'systemlog-clean';
    }

    public function run()
    {

        (new LogDelete())->delete();

    }
}