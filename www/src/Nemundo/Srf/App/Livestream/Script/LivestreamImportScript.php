<?php

namespace Nemundo\Srf\App\Livestream\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Srf\App\Livestream\Import\RadioLivestreamImport;

class LivestreamImportScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'srf-livestream-import';
    }

    public function run()
    {
        (new RadioLivestreamImport())->importData();
    }
}