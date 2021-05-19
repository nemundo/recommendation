<?php

namespace Nemundo\Project\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Db\Provider\MySql\Database\MySqlDatabase;
use Nemundo\Model\Path\DataPath;
use Nemundo\Model\Path\RedirectDataPath;
use Nemundo\Project\Path\LogPath;
use Nemundo\Project\Path\TmpPath;

class ProjectCleanScript extends AbstractConsoleScript
{

    protected function loadScript()
    {

        $this->scriptName = 'project-clean';

    }


    public function run()
    {

        (new TmpPath())
            ->emptyDirectory();

        (new LogPath())
            ->emptyDirectory();

        (new DataPath())
            ->emptyDirectory();

        (new RedirectDataPath())
            ->emptyDirectory();

        (new MySqlDatabase())
            ->emptyDatabase();


    }


}