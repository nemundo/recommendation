<?php

namespace Nemundo\App\Help\Script;

use Nemundo\App\Help\Application\HelpApplication;
use Nemundo\App\Help\Setup\HelpSetup;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\App\ContentAppProject;
use Nemundo\Content\ContentProject;
use Nemundo\FrameworkProject;

class HelpImportScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'help-import';
    }

    public function run()
    {

        (new HelpApplication())->reinstallApp();

        (new HelpSetup())
            ->addProject(new ContentProject())
            ->addProject(new ContentAppProject())
            ->addProject(new FrameworkProject());


    }
}