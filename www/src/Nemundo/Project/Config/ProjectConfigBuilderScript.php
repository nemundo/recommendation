<?php

namespace Nemundo\Project\Config;

use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Core\Console\ConsoleInput;
use Nemundo\Core\Type\File\File;
use Nemundo\Project\ProjectConfig;

class ProjectConfigBuilderScript extends AbstractScript
{

    public function run()
    {

        $configFilename = ProjectConfig::$projectPath . 'config.ini';
        $configFile = new File($configFilename);
        if (!$configFile->fileExists()) {

            $input = new ConsoleInput();
            $input->message = 'Filename config.ini';
            $input->defaultValue = $filename = getcwd() . DIRECTORY_SEPARATOR . 'config.ini';

            $config = new ProjectConfigWriter();
            $config->filename = $input->getValue();
            $config->writeFile();

            $config = new ProjectConfigReader();
            $config->filename = ProjectConfig::$projectPath . 'config.ini';
            $config->readFile();

        }

    }

}