<?php

namespace Nemundo\Dev\ProjectBuilder\Code;


use Nemundo\Dev\Code\PhpFile;

class ProjectConfigCode extends AbstractProjectCode
{

    public function createCode()
    {

        $php = new PhpFile();
        $php->filename = $this->path . 'config.php';

        $php->add('error_reporting(E_ALL);');
        $php->add('require \'vendor/autoload.php\';');

        $php->add('\Nemundo\Project\ProjectConfig::$projectPath = __DIR__ . DIRECTORY_SEPARATOR;');
        $php->add('(new \Nemundo\Project\Loader\MySqlProjectLoader())->loadProject();');
        /*$php->add('$config = new \Nemundo\Project\Config\ProjectConfigReader();');
        $php->add('$config->filename = __DIR__ . \'/config.ini\';');
        $php->add('$config->readFile();');
        $php->add('');*/

        $php->saveFile();

    }

}