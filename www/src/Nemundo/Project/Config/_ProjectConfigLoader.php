<?php

namespace Nemundo\Project\Config;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\File\FileUtility;
use Nemundo\Core\Log\LogConfig;
use Nemundo\Model\ModelConfig;
use Nemundo\Project\ProjectConfig;
use Nemundo\Web\WebConfig;

class ProjectConfigLoader extends AbstractBaseClass
{

    public function loadConfig()
    {

        ProjectConfig::$projectPath = (new FileUtility())->appendDirectorySeparatorIfNotExists(ProjectConfig::$projectPath);

        WebConfig::$webPath = ProjectConfig::$projectPath . 'web' . DIRECTORY_SEPARATOR;
        ProjectConfig::$tmpPath = ProjectConfig::$projectPath . 'tmp' . DIRECTORY_SEPARATOR;
        LogConfig::$logPath = ProjectConfig::$projectPath . 'log' . DIRECTORY_SEPARATOR;

        ModelConfig::$dataPath = WebConfig::$webPath . 'data' . DIRECTORY_SEPARATOR;
        ModelConfig::$dataUrl = WebConfig::$webUrl . 'data/';

        ModelConfig::$redirectDataPath = ProjectConfig::$projectPath . 'data_redirect' . DIRECTORY_SEPARATOR;

    }

}