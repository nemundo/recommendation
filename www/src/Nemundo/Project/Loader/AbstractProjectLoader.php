<?php

namespace Nemundo\Project\Loader;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\FileUtility;
use Nemundo\Core\Log\LogConfig;
use Nemundo\Db\DbConfig;
use Nemundo\Model\ModelConfig;
use Nemundo\Project\Path\LogPath;
use Nemundo\Project\ProjectConfig;
use Nemundo\Web\WebConfig;

abstract class AbstractProjectLoader extends AbstractBase
{

    abstract public function loadProject();

    protected function loadPath()
    {

        ProjectConfig::$projectPath = (new FileUtility())->appendDirectorySeparatorIfNotExists(ProjectConfig::$projectPath);

        WebConfig::$webPath = ProjectConfig::$projectPath . 'web' . DIRECTORY_SEPARATOR;
        ProjectConfig::$tmpPath = ProjectConfig::$projectPath . 'tmp' . DIRECTORY_SEPARATOR;
        LogConfig::$logPath = ProjectConfig::$projectPath . 'log' . DIRECTORY_SEPARATOR;

        ModelConfig::$dataPath = WebConfig::$webPath . 'data' . DIRECTORY_SEPARATOR;
        ModelConfig::$dataUrl = WebConfig::$webUrl . 'data/';

        ModelConfig::$redirectDataPath = ProjectConfig::$projectPath . 'data_redirect' . DIRECTORY_SEPARATOR;

        DbConfig::$slowQueryLogPath = (new LogPath())->getPath();

    }

}